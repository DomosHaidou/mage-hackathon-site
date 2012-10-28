<?php

namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;
use \MagentoHackathon\RegistrationBundle\Form\ProjectIdeaType;
use \MagentoHackathon\RegistrationBundle\Entity\ProjectIdea;

class ProjectIdeaController extends Controller
{
    /**
     * @Template
     */
    public function indexAction(Request $request)
    {
        $projectIdea = new ProjectIdea();
        $form = $this->createForm(new ProjectIdeaType(), $projectIdea);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();

                $projectIdea->setCreatedAt(new \DateTime());

                $em->persist($projectIdea);
                $em->flush();

                $this->get('session')
                ->setFlash('alert-success', 'Your changes were saved! Thanks for your submission.');

                return $this->redirect($this->generateUrl('_projectIdeaAll'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function allAction()
    {
        $projectIdeas = $this->getDoctrine()
        ->getRepository('MagentoHackathonRegistrationBundle:ProjectIdea')->findAll();

        return array('projectIdeas' => $projectIdeas);
    }
}