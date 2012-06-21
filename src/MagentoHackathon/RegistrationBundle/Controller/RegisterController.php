<?php
namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \MagentoHackathon\RegistrationBundle\Form\UserType;
use \MagentoHackathon\RegistrationBundle\Entity\User;
use \MagentoHackathon\RegistrationBundle\Entity\Event;

class RegisterController extends Controller {

    /**
     * @Template
     */
    public function indexAction(Request $request) {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        if($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();

                $user->setPaid(0)->setPaymentStatus(User::PAYMENT_STATUS_NOT_PAID)->setStatus(User::STATUS_REGISTERED);

                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('_thanks', array('id' => $user->getEvent())));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function thanksAction($eventId, $userId) {
        /* @var $event Event */
        $event = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')->find($eventId);
        $user = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:User')->find($userId);
        if($event === null) {
            return $this->redirect($this->generateUrl('_welcome'));
        }
        return array('event' => $event, 'user' => $user, 'seller_mail' => $this->container->getParameter('orderly.paypalipn.email'));
    }
}
