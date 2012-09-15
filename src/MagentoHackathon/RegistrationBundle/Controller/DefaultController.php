<?php

namespace MagentoHackathon\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $events = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')
        ->createQueryBuilder('e')
        ->where('e.dateFrom > CURRENT_TIMESTAMP()')
        ->orderBy('e.dateFrom', 'ASC')
        ->setMaxResults(3)
        ->getQuery()->getResult();

        return $this->render('MagentoHackathonRegistrationBundle:Default:index.html.twig', array('events' => $events));
    }

    public function rssFeedAction()
    {
        return $this->getFeed('rss');
    }

    public function atomFeedAction()
    {
        return $this->getFeed('atom');

    }

    protected function getFeed($type)
    {
        $events = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')->findAll();

        $feed = $this->get('eko_feed.feed.manager')->get('events');
        $feed->addFromArray($events);

        return new Response($feed->render($type));
    }


    /**
     * @Template
     */
    public function eventAboutAction($eventId)
    {
        $event = $this->getDoctrine()->getRepository('MagentoHackathonRegistrationBundle:Event')
        ->find($eventId);
        if (!$event) {
            return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('_welcome'));
        }
        return array('event' => $event);
    }

    /**
     * @Template
     */
    public function imprintAction()
    {
        return array();
    }

    /**
     * @Template
     */
    public function aboutAction()
    {
        return array();
    }

}
