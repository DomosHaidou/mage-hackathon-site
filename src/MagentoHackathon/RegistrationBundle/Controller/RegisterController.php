<?php
namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \MagentoHackathon\RegistrationBundle\Form\UserType;
use \MagentoHackathon\RegistrationBundle\Entity\User;

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

                return $this->redirect($this->generateUrl('_thanks'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function thanksAction() {
        return array();
    }
}
