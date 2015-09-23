<?php

namespace Entity;

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
     * @var Hotel[]
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Hotel[]
     */
    public function getHotels()
    {
        return $this->hotels;
    }

    /**
     * @param mixed $hotel
     * @return $this
     */
    public function setHotel(Hotel$hotel)
    {
        $this->hotel[] = $hotel;

        return $this;
    }
}