<?php

namespace Entity;

use Facade\PartnerFacade;

class Hotel
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
    private $address;

    /**
     * @var \Facade\PartnerFacade[]
     */
    private $partner;

    /**
     * @param $id
     * @param $name
     * @param $address
     */
    public function __construct($id, $name, $address)
    {
        $this->setId($id)
             ->setName($name)
             ->setAddress($address);
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
     * Get the address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the array of partners
     *
     * @return PartnerFacade[]
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set a partner
     *
     * @param PartnerFacade $partner
     * @return $this
     */
    public function setPartner(PartnerFacade $partner)
    {
        $this->partner[] = $partner;

        return $this;
    }
}