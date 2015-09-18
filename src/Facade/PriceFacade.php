<?php

namespace Facade;

use Dao\PriceDao;
use Entity\Price;

class PriceFacade
{
    /**
     * @var \Dao\PriceDao
     */
    private $priceDao;

    public function __construct()
    {
        if (null == $this->priceDao) {
            $this->priceDao = new PriceDao();
        }
    }

    /**
     * Insert a new item in the array
     *
     * @param Price $price
     */
    public function add(Price $price)
    {
        $this->priceDao->add($price);
    }

    /**
     * Update an item from the array
     *
     * @param Price $price
     */
    public function update(Price $price)
    {
        $this->priceDao->update($price);
    }

    /**
     * Delete a price passing the id from the price
     *
     * @param int $id Price id
     * @return bool
     */
    public function delete($id)
    {
        return $this->priceDao->delete($id);
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Price
     */
    public function get($id)
    {
        return $this->priceDao->get($id);
    }

    /**
     * Return all
     *
     * @return \Entity\Price[]
     */
    public function getAll()
    {
        return $this->priceDao->getAll();
    }
}