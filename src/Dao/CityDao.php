<?php

namespace Dao;

use Entity\City;
use Entity\Hotel;
use Facade\HotelFacade;

class CityDao implements \Countable
{
    /**
     * @var \Entity\City[]
     */
    private $city = array();

    /**
     * Insert a new item in the array
     *
     * @param City $city
     * @return int
     */
    public function add(City $city)
    {
        $this->city[$city->getId()] = $city;

        return $this->count();
    }

    /**
     * Add a HotelFacade to a City
     *
     * @param City $city
     * @param HotelFacade $hotel
     */
    public function addHotel(City $city, HotelFacade $hotel)
    {
        $city = $this->get($city->getId());
        $city->setHotel($hotel);

        $this->update($city);
    }

    /**
     * Update an item from the array
     *
     * @param City $city
     */
    public function update(City $city)
    {
        $this->add($city);
    }

    /**
     * Delete a city passing the City object
     *
     * @param City $city
     * @return bool
     */
    public function delete(City $city)
    {
        if ($this->get($city->getId())) {
            unset($this->city[$city->getId()]);

            return true;
        }

        return false;
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return City|null
     */
    public function get($id)
    {
        if (isset($this->city[$id]))
            return $this->city[$id];

        return null;
    }

    /**
     * Return all
     *
     * @return \Entity\City[]
     */
    public function getAll()
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->city);
    }
}