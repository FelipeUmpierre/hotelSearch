<?php

namespace Entity;

use Facade\PriceFacade;

class Partner
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $homepage;

    /**
     * @var Price[]
     */
    private $price;

    /**
     * @param int $id
     * @param string $name
     * @param string $homepage
     */
    public function __construct($id, $name, $homepage)
    {
        $this->setId($id)
             ->setName($name)
             ->setHomepage($homepage);
    }

    /**
     * Get the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the homepage
     *
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set the homepage
     *
     * @param string $homepage
     * @return $this
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get the prices
     *
     * @return PriceFacade[]
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the price
     *
     * @param PriceFacade $price
     * @return $this
     */
    public function setPrice(PriceFacade $price)
    {
        $this->price[] = $price;

        return $this;
    }
}