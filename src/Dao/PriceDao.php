<?php

namespace Dao;

use Entity\Price;

class PriceDao implements \Countable
{
    /**
     * @var \Entity\Price[]
     */
    private $price;

    /**
     * Insert a new item in the array
     *
     * @param Price $price
     * @return int
     */
    public function add(Price $price)
    {
        $this->price[$price->getId()] = $price;

        return $this->count();
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
     * @param Price $price
     * @return bool
     */
    public function delete(Price $price)
    {
        if ($this->get($price->getId())) {
            unset($this->price[$price->getId()]);

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

    /**
     * @return int
     */
    public function count()
    {
        return count($this->price);
    }
}