<?php
namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use \MagentoHackathon\RegistrationBundle\Form\UserType;
use \MagentoHackathon\RegistrationBundle\Entity\User;
use \MagentoHackathon\RegistrationBundle\Entity\Event;

use \Orderly\PayPalIpnBundle\Ipn;

class RegisterController extends Controller
{

    /**
     * @var Ipn
     */
    public $paypal_ipn;

    /**
     * @Template
     */
    public function indexAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();

                $user->setPaid(0)->setPaymentStatus(User::PAYMENT_STATUS_NOT_PAID)->setStatus(User::STATUS_REGISTERED);

                $em->persist($user);
                $em->flush();
                /* @var $session Session */
                $session = $this->get('session');
                $session->set('user', $user);

                $mailParams = array(
                    'userName' => $user->getFirstname(), // Name of the user
                    'userId' => $user->getUserId(), // ID of the user
                    'eventName' => $user->getEvent()->getName(), // Name of the event
                    'dateFrom' => $user->getEvent()->getDateFrom()->format('Y-m-d h:i:s'), // starting date
                    'dateTo' => $user->getEvent()->getDateTo()->format('Y-m-d h:i:s') //end date
                );

                $message = \Swift_Message::newInstance()
                    ->setSubject('Magento Hackathon: ' . $user->getEvent()->getName())
                    ->setFrom('info@mage-hackathon.de')
                    ->setTo($user->getMail())
                    ->setBody($this->renderView('MagentoHackathonRegistrationBundle:Register:registrationMail.txt.twig', $mailParams));
                $this->get('mailer')->send($message);

                return $this->redirect($this->generateUrl('_thanks'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function thanksAction($userId)
    {
        $user = null;
        if (!is_null($userId)) {
            $user = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:User')->find($userId);
        } else {
            /* @var $session Session */
            $session = $this->get('session');
            /* @var $user User */
            $user = $session->get('user');
            $session->remove('user');
        }

        if (!$user) {
            return new RedirectResponse($this->generateUrl('_welcome'));
        }

        $event = $user->getEvent();
        return array('event' => $event, 'user' => $user,
            'paypalUrl' => $this->container->getParameter('orderly.paypalipn.url'),
            'seller_mail' => $this->container->getParameter('orderly.paypalipn.email')
        );
    }


    /**
     * @Template
     */
    public function ipnAction()
    {
        //getting ipn service registered in container
        $this->paypal_ipn = $this->get('orderly_pay_pal_ipn');

        //validate ipn (generating response on PayPal IPN request)
        if ($this->paypal_ipn->validateIPN()) {
            // Succeeded, now let's extract the order
            $this->paypal_ipn->extractOrder();

            // And we save the order now (persist and extract are separate because you might only want to persist the order in certain circumstances).
            $this->paypal_ipn->saveOrder();

            // Now let's check what the payment status is and act accordingly
            if ($this->paypal_ipn->getOrderStatus() == Ipn::PAID) {
                $logger = $this->get('logger');
                if (count($this->paypal_ipn->getOrderItems()) > 1) {
                    /* @var $logger \Monolog\Logger */
                    $logger->err('More than one order-item in IPN!');
                } else {
                    $orderItem = array_pop($this->paypal_ipn->getOrderItems());
                    $order = $this->paypal_ipn->getOrder();
                    /* @var $orderItem \Orderly\PayPalIpnBundle\Entity\IpnOrderItems */
                    /* @var $order \Orderly\PayPalIpnBundle\Entity\IpnOrders */
                    /* @var $user User */
                    /* @var $vent Event */
                    $user = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:User')
                        ->find($orderItem->getItemNumber());

                    $event = $user->getEvent();
                    if ($order->getMcGross() + $order->getMcFee() == $event->getPrice()) {
                        $user->setPaid($user->getPaid() + $order->getMcGross() + $order->getMcFee())
                            ->setPaymentStatus(User::PAYMENT_STATUS_PAID);

                    } elseif ($order->getMcGross() + $order->getMcFee() < $event->getPrice()) {
                        $user->setPaid($user->getPaid() + $order->getMcGross() + $order->getMcFee())
                            ->setPaymentStatus(User::PAYMENT_STATUS_PAID_NOT_ENOUGH);

                    } else {
                        $user->setPaid($user->getPaid() + $order->getMcGross() + $order->getMcFee())
                            ->setPaymentStatus(User::PAYMENT_STATUS_PAID);
                        $logger->addAlert($user->getFirstname() . ' ' . $user->getLastname() . ' paid too much!');
                    }

                    $mailParams = array(
                        'userName' => $user->getFirstname(), // Name of the user
                        'userId' => $user->getUserId(), // ID of the user
                        'eventName' => $event->getName(), // Name of the event
                        'dateFrom' => $event->getDateFrom()->format('Y-m-d h:i:s'), // starting date
                        'dateTo' => $event->getDateTo()->format('Y-m-d h:i:s'), //end date
                        'amount' => $user->getPaid(),
                        'price' => $event->getPrice()
                    );

                    $message = \Swift_Message::newInstance()
                        ->setSubject('Magento Hackathon: ' . $user->getEvent()->getName())
                        ->setFrom('info@mage-hackathon.de')
                        ->setTo($user->getMail())
                        ->setBody($this->renderView('MagentoHackathonRegistrationBundle:Register:registrationMail.txt.twig', $mailParams));
                    $this->get('mailer')->send($message);

                    $em = $this->getDoctrine()->getEntityManager();

                    $em->persist($user);
                    $em->flush();
                }

            }

        } else // Just redirect to the root URL
        {
            return $this->redirect('/');
        }

        $response = new Response();
        $response->setStatusCode(200);

        return $response;
    }
}
