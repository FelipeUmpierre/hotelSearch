<?php

namespace Facade;

use Entity\City;

class CityFacade
{
    /**
     * @var \Entity\City[]
     */
    private $city = array();

    /**
     * Insert a new item in the array
     *
     * @param City $city
     */
    public function add(City $city)
    {
        $this->city[$city->getId()] = $city;
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
     * Delete a city passing the id from the city
     *
     * @param int $id City id
     * @return bool
     */
    public function delete($id)
    {
        if ($this->get($id)) {
            unset($this->city[$id]);

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
}