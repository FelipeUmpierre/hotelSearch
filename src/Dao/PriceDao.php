<?php

namespace Dao;

use Entity\Price;

class PriceDao
{
    /**
     * @var \Entity\Price[]
     */
    private $price;

    /**
     * Insert a new item in the array
     *
     * @param Price $price
     */
    public function add(Price $price)
    {
        $this->price[$price->getId()] = $price;
    }

    /**
     * Update an item from the array
     *
     * @param Price $price
     */
    public function update(Price $price)
    {
        $this->add($price);
    }

    /**
     * Delete a price passing the id from the price
     *
     * @param int $id Price id
     * @return bool
     */
    public function delete($id)
    {
        if ($this->get($id)) {
            unset($this->price[$id]);

            return true;
        }

        return false;
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Price
     */
    public function get($id)
    {
        if (isset($this->price[$id]))
            return $this->price[$id];

        return null;
    }

    /**
     * Return all
     *
     * @return \Entity\Price[]
     */
    public function getAll()
    {
        return $this->price;
    }
}