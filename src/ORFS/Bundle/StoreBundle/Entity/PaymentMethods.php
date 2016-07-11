<?php

namespace ORFS\Bundle\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentMethods
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ORFS\Bundle\StoreBundle\Entity\PaymentMethodsRepository")
 */
class PaymentMethods
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
     * @ORM\Column(name="customerId", type="integer")
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="cardHolderName", type="string", length=255)
     */
    private $cardHolderName;

    /**
     * @var string
     *
     * @ORM\Column(name="cardDigits", type="string", length=255)
     */
    private $cardDigits;

    /**
     * @var string
     *
     * @ORM\Column(name="expDate", type="string", length=255)
     */
    private $expDate;


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
     * Set customerId
     *
     * @param integer $customerId
     * @return PaymentMethods
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
     * Set cardHolderName
     *
     * @param string $cardHolderName
     * @return PaymentMethods
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;

        return $this;
    }

    /**
     * Get cardHolderName
     *
     * @return string 
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * Set cardDigits
     *
     * @param string $cardDigits
     * @return PaymentMethods
     */
    public function setCardDigits($cardDigits)
    {
        $this->cardDigits = $cardDigits;

        return $this;
    }

    /**
     * Get cardDigits
     *
     * @return string 
     */
    public function getCardDigits()
    {
        return $this->cardDigits;
    }

    /**
     * Set expDate
     *
     * @param string $expDate
     * @return PaymentMethods
     */
    public function setExpDate($expDate)
    {
        $this->expDate = $expDate;

        return $this;
    }

    /**
     * Get expDate
     *
     * @return string 
     */
    public function getExpDate()
    {
        return $this->expDate;
    }
}
