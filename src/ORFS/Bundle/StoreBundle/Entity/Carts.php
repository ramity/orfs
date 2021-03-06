<?php

namespace ORFS\Bundle\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carts
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ORFS\Bundle\StoreBundle\Entity\CartsRepository")
 */
class Carts
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
     * @ORM\Column(name="uniqId", type="string", length=32)
     */
    private $uniqId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products", type="integer")
     */
    private $products;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;


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
     * Set uniqId
     *
     * @param string $uniqId
     * @return Carts
     */
    public function setUniqId($uniqId)
    {
        $this->uniqId = $uniqId;

        return $this;
    }

    /**
     * Get uniqId
     *
     * @return string 
     */
    public function getUniqId()
    {
        return $this->uniqId;
    }

    /**
     * Set products
     *
     * @param integer $products
     * @return Carts
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
     * Set total
     *
     * @param integer $total
     * @return Carts
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
