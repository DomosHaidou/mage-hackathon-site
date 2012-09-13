<?php
namespace MagentoHackathon\RegistrationBundle\Service;

use \Doctrine\ORM\EntityManager;
use \MagentoHackathon\RegistrationBundle\Entity\Event as EventModel;


class Event extends \Twig_Extension
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'eventService';
    }

    /**
     * Count the number of registed attendes for an event
     *
     * @param EventModel $event
     *
     * @return mixed
     */
    public function countAttendes(EventModel $event)
    {
        $qb = $this->entityManager->createQueryBuilder()
        ->select('count(u.event)')
        ->from('MagentoHackathonRegistrationBundle:User', 'u')
        ->where('u.event = :event')
        ->setParameter('event', $event);

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function countCountries(EventModel $event)
    {
        $qb = $this->entityManager->createQueryBuilder()
        ->select('u.country')->distinct()
        ->from('MagentoHackathonRegistrationBundle:User', 'u')
        ->where('u.event = :event')
        ->setParameter('event', $event);

        return count($qb->getQuery()->getResult());
    }


    public function getFilters()
    {
        return array(
            'countAttendes' => new \Twig_Filter_Method($this, 'countAttendes'),
            'countCountries' => new \Twig_Filter_Method($this, 'countCountries'),
        );
    }
}