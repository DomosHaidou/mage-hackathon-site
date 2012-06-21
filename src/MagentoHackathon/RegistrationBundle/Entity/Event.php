<?php

namespace MagentoHackathon\RegistrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagentoHackathon\RegistrationBundle\Entity\Event
 */
class Event
{

    /**
     * @var \MagentoHackathon\RegistrationBundle\Entity\User
     */
    private $participants;

    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var float $price
     */
    private $price;

    /**
     * @var integer $eventId
     */
    private $eventId;

    /**
     * @var \DateTime $date_from
     */
    private $date_from;

    /**
     * @var \DateTime $date_to
     */
    private $date_to;


    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Add participants
     *
     * @param User $participants
     */
    public function addUser(\MagentoHackathon\RegistrationBundle\Entity\User $participants)
    {
        $this->participants[] = $participants;
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set date_from
     *
     * @param \DateTime $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;
    }

    /**
     * Get date_from
     *
     * @return \DateTime
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set date_to
     *
     * @param \DateTime $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->date_to = $dateTo;
    }

    /**
     * Get date_to
     *
     * @return \DateTime
     */
    public function getDateTo()
    {
        return $this->date_to;
    }
}