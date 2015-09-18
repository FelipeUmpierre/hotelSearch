<?php

namespace Facade;

use Dao\CityDao;
use Entity\City;

class CityFacade
{
    /**
     * @var \Dao\CityDao
     */
    private $cityDao;

    public function __construct()
    {
        if (null == $this->cityDao) {
            $this->cityDao = new CityDao();
        }
    }

    /**
     * Insert a new item in the array
     *
     * @param City $city
     */
    public function add(City $city)
    {
        $this->cityDao->add($city);
    }

    /**
     * Update an item from the array
     *
     * @param City $city
     */
    public function update(City $city)
    {
        $this->cityDao->update($city);
    }

    /**
     * Delete a city passing the id from the city
     *
     * @param int $id City id
     * @return bool
     */
    public function delete($id)
    {
        return $this->cityDao->delete($id);
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return City|null
     */
    public function get($id)
    {
        return $this->cityDao->get($id);
    }

    /**
     * Return all
     *
     * @return \Entity\City[]
     */
    public function getAll()
    {
        return $this->cityDao->getAll();
    }
}