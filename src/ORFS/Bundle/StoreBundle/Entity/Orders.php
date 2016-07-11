<?php

namespace ORFS\Bundle\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ORFS\Bundle\StoreBundle\Entity\OrdersRepository")
 */
class Orders
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
     * @var integer
     *
     * @ORM\Column(name="products", type="integer")
     */
    private $products;

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
     * @ORM\Column(name="shippingStreetAddressOne", type="string", length=255)
     */
    private $shippingStreetAddressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="shippingStreetAddressTwo", type="string", length=255)
     */
    private $shippingStreetAddressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="shippingCity", type="string", length=255)
     */
    private $shippingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="shippingState", type="string", length=255)
     */
    private $shippingState;

    /**
     * @var integer
     *
     * @ORM\Column(name="shippingZipCode", type="integer")
     */
    private $shippingZipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="billingStreetAddressOne", type="string", length=255)
     */
    private $billingStreetAddressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="billingStreetAddressTwo", type="string", length=255)
     */
    private $billingStreetAddressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="billingCity", type="string", length=255)
     */
    private $billingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="billingState", type="string", length=255)
     */
    private $billingState;

    /**
     * @var integer
     *
     * @ORM\Column(name="billingZipCode", type="integer")
     */
    private $billingZipCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="deliveryMethod", type="integer")
     */
    private $deliveryMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="deliveryInstructions", type="string", length=3000)
     */
    private $deliveryInstructions;

    /**
     * @var integer
     *
     * @ORM\Column(name="schedule", type="integer")
     */
    private $schedule;

    /**
     * @var integer
     *
     * @ORM\Column(name="couponCodes", type="integer")
     */
    private $couponCodes;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=3000)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="eventLogs", type="integer")
     */
    private $eventLogs;


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
     * Set products
     *
     * @param integer $products
     * @return Orders
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return integer 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Orders
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
     * @return Orders
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
     * @return Orders
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
     * @return Orders
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
     * @return Orders
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
     * Set shippingStreetAddressOne
     *
     * @param string $shippingStreetAddressOne
     * @return Orders
     */
    public function setShippingStreetAddressOne($shippingStreetAddressOne)
    {
        $this->shippingStreetAddressOne = $shippingStreetAddressOne;

        return $this;
    }

    /**
     * Get shippingStreetAddressOne
     *
     * @return string 
     */
    public function getShippingStreetAddressOne()
    {
        return $this->shippingStreetAddressOne;
    }

    /**
     * Set shippingStreetAddressTwo
     *
     * @param string $shippingStreetAddressTwo
     * @return Orders
     */
    public function setShippingStreetAddressTwo($shippingStreetAddressTwo)
    {
        $this->shippingStreetAddressTwo = $shippingStreetAddressTwo;

        return $this;
    }

    /**
     * Get shippingStreetAddressTwo
     *
     * @return string 
     */
    public function getShippingStreetAddressTwo()
    {
        return $this->shippingStreetAddressTwo;
    }

    /**
     * Set shippingCity
     *
     * @param string $shippingCity
     * @return Orders
     */
    public function setShippingCity($shippingCity)
    {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * Get shippingCity
     *
     * @return string 
     */
    public function getShippingCity()
    {
        return $this->shippingCity;
    }

    /**
     * Set shippingState
     *
     * @param string $shippingState
     * @return Orders
     */
    public function setShippingState($shippingState)
    {
        $this->shippingState = $shippingState;

        return $this;
    }

    /**
     * Get shippingState
     *
     * @return string 
     */
    public function getShippingState()
    {
        return $this->shippingState;
    }

    /**
     * Set shippingZipCode
     *
     * @param integer $shippingZipCode
     * @return Orders
     */
    public function setShippingZipCode($shippingZipCode)
    {
        $this->shippingZipCode = $shippingZipCode;

        return $this;
    }

    /**
     * Get shippingZipCode
     *
     * @return integer 
     */
    public function getShippingZipCode()
    {
        return $this->shippingZipCode;
    }

    /**
     * Set billingStreetAddressOne
     *
     * @param string $billingStreetAddressOne
     * @return Orders
     */
    public function setBillingStreetAddressOne($billingStreetAddressOne)
    {
        $this->billingStreetAddressOne = $billingStreetAddressOne;

        return $this;
    }

    /**
     * Get billingStreetAddressOne
     *
     * @return string 
     */
    public function getBillingStreetAddressOne()
    {
        return $this->billingStreetAddressOne;
    }

    /**
     * Set billingStreetAddressTwo
     *
     * @param string $billingStreetAddressTwo
     * @return Orders
     */
    public function setBillingStreetAddressTwo($billingStreetAddressTwo)
    {
        $this->billingStreetAddressTwo = $billingStreetAddressTwo;

        return $this;
    }

    /**
     * Get billingStreetAddressTwo
     *
     * @return string 
     */
    public function getBillingStreetAddressTwo()
    {
        return $this->billingStreetAddressTwo;
    }

    /**
     * Set billingCity
     *
     * @param string $billingCity
     * @return Orders
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingCity
     *
     * @return string 
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * Set billingState
     *
     * @param string $billingState
     * @return Orders
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * Get billingState
     *
     * @return string 
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * Set billingZipCode
     *
     * @param integer $billingZipCode
     * @return Orders
     */
    public function setBillingZipCode($billingZipCode)
    {
        $this->billingZipCode = $billingZipCode;

        return $this;
    }

    /**
     * Get billingZipCode
     *
     * @return integer 
     */
    public function getBillingZipCode()
    {
        return $this->billingZipCode;
    }

    /**
     * Set deliveryMethod
     *
     * @param integer $deliveryMethod
     * @return Orders
     */
    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;

        return $this;
    }

    /**
     * Get deliveryMethod
     *
     * @return integer 
     */
    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    /**
     * Set deliveryInstructions
     *
     * @param string $deliveryInstructions
     * @return Orders
     */
    public function setDeliveryInstructions($deliveryInstructions)
    {
        $this->deliveryInstructions = $deliveryInstructions;

        return $this;
    }

    /**
     * Get deliveryInstructions
     *
     * @return string 
     */
    public function getDeliveryInstructions()
    {
        return $this->deliveryInstructions;
    }

    /**
     * Set schedule
     *
     * @param integer $schedule
     * @return Orders
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return integer 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set couponCodes
     *
     * @param integer $couponCodes
     * @return Orders
     */
    public function setCouponCodes($couponCodes)
    {
        $this->couponCodes = $couponCodes;

        return $this;
    }

    /**
     * Get couponCodes
     *
     * @return integer 
     */
    public function getCouponCodes()
    {
        return $this->couponCodes;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Orders
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set eventLogs
     *
     * @param integer $eventLogs
     * @return Orders
     */
    public function setEventLogs($eventLogs)
    {
        $this->eventLogs = $eventLogs;

        return $this;
    }

    /**
     * Get eventLogs
     *
     * @return integer 
     */
    public function getEventLogs()
    {
        return $this->eventLogs;
    }
}
