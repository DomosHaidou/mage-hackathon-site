<?php

namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('MagentoHackathonRegistrationBundle:Default:index.html.twig');
    }

    /**
     * @Template
     */
    public function aboutAction() {
        return array();
    }

    /**
     * @Template
     */
    public function eventAboutAction($eventId) {
        $event = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')
        ->find($eventId);
        if(!$event) {
            return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('_welcome'));
        }
        return array('event' => $event);
    }



    /**
     * @Template
     */
    public function imprintAction() {
        return array();
    }

}
