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
        if(!is_null($userId)) {
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
                /* HEALTH WARNING:
                 *
                 * Please note that this PAID block does nothing. In other words, this controller will not respond to a successful order
                 * with any notification such as email or similar. You will have to identify paid orders by checking your database.
                 *
                 * If you want to send email notifications on successful receipt of an order, please see the alternative, Twig template-
                 * based example controller: TwigEmailNotification.php
                 */
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
