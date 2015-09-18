<?php

namespace Dao;

use Entity\Hotel;

class HotelDao
{
    /**
     * @var \Entity\Hotel[]
     */
    private $hotel = array();

    /**
     * Insert a new item in the array
     *
     * @param Hotel $hotel
     */
    public function add(Hotel $hotel)
    {
        $this->hotel[$hotel->getId()] = $hotel;
    }

    /**
     * Update an item from the array
     *
     * @param Hotel $hotel
     */
    public function update(Hotel $hotel)
    {
        $this->add($hotel);
    }

    /**
     * Delete a hotel passing the id from the hotel
     *
     * @param int $id Hotel id
     * @return bool
     */
    public function delete($id)
    {
        if ($this->get($id)) {
            unset($this->hotel[$id]);

            return true;
        }

        return false;
    }

    /**
     * Add a Partner to a Hotel
     *
     * @param Partner $partner
     * @param $hotelId
     */
    public function addPartnerToHotel(Partner $partner, $hotelId)
    {
        $hotel = $this->get($hotelId);
        $hotel->setPartner($partner);

        $this->update($hotel);
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Hotel
     */
    public function get($id)
    {
        if (isset($this->hotel[$id]))
            return $this->hotel[$id];

        return null;
    }

    /**
     * Return all
     *
     * @return \Entity\Hotel[]
     */
    public function getAll()
    {
        return $this->hotel;
    }
}