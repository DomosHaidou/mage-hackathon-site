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
    public function imprintAction() {
        return array();
    }

}
