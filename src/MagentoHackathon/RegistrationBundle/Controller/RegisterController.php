<?php
namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
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
				return $this->redirect($this->generateUrl('_thanks', array('eventId' => $user->getEvent()->getEventId(), 'userId' => $user->getUserId())));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function thanksAction($eventId, $userId)
    {
        /* @var $event Event */
        $event = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')->find($eventId);
        $user = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:User')->find($userId);
        if ($event === null) {
            return $this->redirect($this->generateUrl('_welcome'));
        }
        return array('event' => $event, 'user' => $user, 'seller_mail' => $this->container->getParameter('orderly.paypalipn.email'));
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
