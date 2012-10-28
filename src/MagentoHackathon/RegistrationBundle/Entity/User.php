<?php

namespace MagentoHackathon\RegistrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagentoHackathon\RegistrationBundle\Entity\User
 */
class User
{

    const STATUS_REGISTERED = 0;
    /**
     * Double opt in mail clicked
     */
    const STATUS_CONFIRMED = 1;

    const PAYMENT_STATUS_NOT_PAID = 0;
    const PAYMENT_STATUS_PAID = 1;
    const PAYMENT_STATUS_PAID_NOT_ENOUGH = 2;

    /**
     * @var string $firstname
     */
    private $firstname;

    /**
     * @var string $lastname
     */
    private $lastname;

    /**
     * @var string $address
     */
    private $address;

    /**
     * @var string $zip
     */
    private $zip;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $githubId
     */
    private $githubId;

    /**
     * @var string $additionalInfos
     */
    private $additionalInfos;

    /**
     * @var string $memo
     */
    private $memo;

    /**
     * @var integer $status
     */
    private $status;

    /**
     * @var float $paid
     */
    private $paid;

    /**
     * @var integer $paymentStatus
     */
    private $paymentStatus;

    /**
     * @var integer $userId
     */
    private $userId;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var string $mail
     */
    private $mail;

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set githubId
     *
     * @param string $githubId
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setGithubId($githubId)
    {
        $this->githubId = $githubId;
        return $this;
    }

    /**
     * Get githubId
     *
     * @return string
     */
    public function getGithubId()
    {
        return $this->githubId;
    }

    /**
     * Set additionalInfos
     *
     * @param string $additionalInfos
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setAdditionalInfos($additionalInfos)
    {
        $this->additionalInfos = $additionalInfos;
        return $this;
    }

    /**
     * Get additionalInfos
     *
     * @return string
     */
    public function getAdditionalInfos()
    {
        return $this->additionalInfos;
    }

    /**
     * Set memo
     *
     * @param string $memo
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * Get memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set paid
     *
     * @param float $paid
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
        return $this;
    }

    /**
     * Get paid
     *
     * @return float
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set paymentStatus
     *
     * @param integer $paymentStatus
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return integer
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set event
     *
     * @param \MagentoHackathon\RegistrationBundle\Entity\Event $event
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setEvent(\MagentoHackathon\RegistrationBundle\Entity\Event $event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * Get event
     *
     * @return \MagentoHackathon\RegistrationBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * Set mail
     *
     * @param string $mail
     * @return \MagentoHackathon\RegistrationBundle\Entity\User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    public function isEventLegal() {
        return (bool)$this->getEvent();
    }
}