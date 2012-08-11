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

    /**
     * @var datetime $dateFrom
     */
    private $dateFrom;

    /**
     * @var datetime $dateTo
     */
    private $dateTo;


    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $shortDescription
     */
    private $shortDescription;


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

    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Return the name of the event for string contextes
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

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

    /**
     * Set dateFrom
     *
     * @param \DateTime $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * Get dateFrom
     *
     * @return \DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * Set dateTo
     *
     * @param \DateTime $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * Get dateTo
     *
     * @return \DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }


    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }
}