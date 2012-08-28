<?php
namespace MagentoHackathon\RegistrationBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use \Doctrine\ORM\EntityManager;

class MenuBuilder
{
    /**
     * Factory to create menus
     *
     * @var \Knp\Menu\FactoryInterface
     */
    private $factory;

    /**
     * Database access
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @param \Knp\Menu\FactoryInterface $factory
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(FactoryInterface $factory, EntityManager $em)
    {
        $this->em = $em;
        $this->factory = $factory;
    }

    /**
     * Main menu at the top
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav'));

        $menu->addChild('Home', array('route' => '_welcome'));
        $menu->addChild('What is a Magento Hackathon?', array('route' => '_about'));
        $menu->addChild('Registration', array('route' => '_registration'));

        $events = $this->em->getRepository('MagentoHackathonRegistrationBundle:Event')->createQueryBuilder('e')
        ->where('e.dateFrom > CURRENT_TIMESTAMP()')
        ->orderBy('e.dateFrom', 'ASC')
        ->setMaxResults(2)
        ->getQuery()->getResult();

        foreach($events as $event) {
            /* @var $event \MagentoHackathon\RegistrationBundle\Entity\Event */
            $menu->addChild($event->getName(), array(
                'route' => '_event_about',
                'routeParameters' => array('eventId' => $event->getEventId())
            ));
        }

        $menu->addChild('Imprint', array('route' => '_imprint'));

        return $menu;
    }
}

