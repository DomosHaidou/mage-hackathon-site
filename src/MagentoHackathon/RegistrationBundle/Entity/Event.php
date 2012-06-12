<?php

namespace MagentoHackathon\RegistrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagentoHackathon\RegistrationBundle\Entity\Event
 */
class Event {

    /**
     * @var \MagentoHackathon\RegistrationBundle\Entity\User
     */
    private $participants;

    public function __construct() {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var datetime $from
     */
    private $from;

    /**
     * @var datetime $to
     */
    private $to;

    /**
     * @var float $price
     */
    private $price;

    /**
     * @var integer $eventId
     */
    private $eventId;


    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set from
     *
     * @param datetime $from
     */
    public function setFrom($from) {
        $this->from = $from;
    }

    /**
     * Get from
     *
     * @return datetime
     */
    public function getFrom() {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param datetime $to
     */
    public function setTo($to) {
        $this->to = $to;
    }

    /**
     * Get to
     *
     * @return datetime
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * Set price
     *
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId() {
        return $this->eventId;
    }

    /**
     * Add participants
     *
     * @param User $participants
     */
    public function addUser(\MagentoHackathon\RegistrationBundle\Entity\User $participants) {
        $this->participants[] = $participants;
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants() {
        return $this->participants;
    }

    public function __toString() {
        return $this->getName();
    }
    /**
     * @var datetime $date_from
     */
    private $date_from;

    /**
     * @var datetime $date_to
     */
    private $date_to;


    /**
     * Set date_from
     *
     * @param datetime $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;
    }

    /**
     * Get date_from
     *
     * @return datetime 
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set date_to
     *
     * @param datetime $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->date_to = $dateTo;
    }

    /**
     * Get date_to
     *
     * @return datetime 
     */
    public function getDateTo()
    {
        return $this->date_to;
    }
}