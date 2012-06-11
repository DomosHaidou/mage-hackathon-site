<?php

namespace MagentoHackathon\RegistrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagentoHackathon\RegistrationBundle\Entity\User
 */
class User {

    const STATUS_REGISTERED = 0;
    /**
     * Double opt in mail clicked
     */
    const STATUS_CONFIRMED = 1;

    const PAYMENT_STATUS_NOT_PAID = 0;
    const PAYMENT_STATUS_PAID = 1;

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
     * @var string $additionalInfos
     */
    private $additionalInfos;

    /**
     * @var text $memo
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
     * @var MagentoHackathon\RegistrationBundle\Entity\Event
     */
    private $event;


    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param string $zip
     */
    public function setZip($zip) {
        $this->zip = $zip;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip() {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set additionalInfos
     *
     * @param string $additionalInfos
     */
    public function setAdditionalInfos($additionalInfos) {
        $this->additionalInfos = $additionalInfos;
    }

    /**
     * Get additionalInfos
     *
     * @return string
     */
    public function getAdditionalInfos() {
        return $this->additionalInfos;
    }

    /**
     * Set memo
     *
     * @param text $memo
     */
    public function setMemo($memo) {
        $this->memo = $memo;
    }

    /**
     * Get memo
     *
     * @return text
     */
    public function getMemo() {
        return $this->memo;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set paid
     *
     * @param float $paid
     */
    public function setPaid($paid) {
        $this->paid = $paid;
    }

    /**
     * Get paid
     *
     * @return float
     */
    public function getPaid() {
        return $this->paid;
    }

    /**
     * Set paymentStatus
     *
     * @param integer $paymentStatus
     */
    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * Get paymentStatus
     *
     * @return integer
     */
    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set event
     *
     * @param \MagentoHackathon\RegistrationBundle\Entity\Event $event
     */
    public function setEvent(\MagentoHackathon\RegistrationBundle\Entity\Event $event) {
        $this->event = $event;
    }

    /**
     * Get event
     *
     * @return \MagentoHackathon\RegistrationBundle\Entity\Event
     */
    public function getEvent() {
        return $this->event;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }
}