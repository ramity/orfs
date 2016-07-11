<?php

namespace ORFS\Bundle\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accounts
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ORFS\Bundle\StoreBundle\Entity\AccountsRepository")
 */
class Accounts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="customerId", type="integer")
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeCreated", type="datetime")
     */
    private $timeCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeLastActive", type="datetime")
     */
    private $timeLastActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="isVerified", type="integer")
     */
    private $isVerified;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders", type="integer")
     */
    private $orders;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var integer
     *
     * @ORM\Column(name="communicationMethod", type="integer")
     */
    private $communicationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationValue", type="string", length=255)
     */
    private $communicationValue;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAddressOne", type="string", length=255)
     */
    private $streetAddressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAddressTwo", type="string", length=255)
     */
    private $streetAddressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipCode", type="integer")
     */
    private $zipCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="paymentMethods", type="integer")
     */
    private $paymentMethods;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Accounts
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Accounts
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Accounts
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set timeCreated
     *
     * @param \DateTime $timeCreated
     * @return Accounts
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;

        return $this;
    }

    /**
     * Get timeCreated
     *
     * @return \DateTime 
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * Set timeLastActive
     *
     * @param \DateTime $timeLastActive
     * @return Accounts
     */
    public function setTimeLastActive($timeLastActive)
    {
        $this->timeLastActive = $timeLastActive;

        return $this;
    }

    /**
     * Get timeLastActive
     *
     * @return \DateTime 
     */
    public function getTimeLastActive()
    {
        return $this->timeLastActive;
    }

    /**
     * Set isVerified
     *
     * @param integer $isVerified
     * @return Accounts
     */
    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * Get isVerified
     *
     * @return integer 
     */
    public function getIsVerified()
    {
        return $this->isVerified;
    }

    /**
     * Set orders
     *
     * @param integer $orders
     * @return Accounts
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return integer 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Accounts
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Accounts
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Accounts
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set communicationMethod
     *
     * @param integer $communicationMethod
     * @return Accounts
     */
    public function setCommunicationMethod($communicationMethod)
    {
        $this->communicationMethod = $communicationMethod;

        return $this;
    }

    /**
     * Get communicationMethod
     *
     * @return integer 
     */
    public function getCommunicationMethod()
    {
        return $this->communicationMethod;
    }

    /**
     * Set communicationValue
     *
     * @param string $communicationValue
     * @return Accounts
     */
    public function setCommunicationValue($communicationValue)
    {
        $this->communicationValue = $communicationValue;

        return $this;
    }

    /**
     * Get communicationValue
     *
     * @return string 
     */
    public function getCommunicationValue()
    {
        return $this->communicationValue;
    }

    /**
     * Set streetAddressOne
     *
     * @param string $streetAddressOne
     * @return Accounts
     */
    public function setStreetAddressOne($streetAddressOne)
    {
        $this->streetAddressOne = $streetAddressOne;

        return $this;
    }

    /**
     * Get streetAddressOne
     *
     * @return string 
     */
    public function getStreetAddressOne()
    {
        return $this->streetAddressOne;
    }

    /**
     * Set streetAddressTwo
     *
     * @param string $streetAddressTwo
     * @return Accounts
     */
    public function setStreetAddressTwo($streetAddressTwo)
    {
        $this->streetAddressTwo = $streetAddressTwo;

        return $this;
    }

    /**
     * Get streetAddressTwo
     *
     * @return string 
     */
    public function getStreetAddressTwo()
    {
        return $this->streetAddressTwo;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Accounts
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
     * Set state
     *
     * @param string $state
     * @return Accounts
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     * @return Accounts
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set paymentMethods
     *
     * @param integer $paymentMethods
     * @return Accounts
     */
    public function setPaymentMethods($paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;

        return $this;
    }

    /**
     * Get paymentMethods
     *
     * @return integer 
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }
}
