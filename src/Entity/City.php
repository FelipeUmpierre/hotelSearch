<?php

namespace Entity;

use Facade\HotelFacade;

class City
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
     * @var \Facade\HotelFacade[]
     */
    private $hotel;

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->setId($id)
             ->setName($name);
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
     * Get the hotels
     *
     * @return \Facade\HotelFacade[]
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set the hotel
     *
     * @param HotelFacade $hotel
     * @return $this
     */
    public function setHotel(HotelFacade $hotel)
    {
        $this->hotel[] = $hotel;

        return $this;
    }
}