<?php

namespace Dao;

use Entity\Hotel;
use Facade\PartnerFacade;

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
     * Add a PartnerFacade to a Hotel
     *
     * @param Hotel $hotel
     * @param PartnerFacade $partnerFacade
     */
    public function addPartner(Hotel $hotel, PartnerFacade $partnerFacade)
    {
        $hotel = $this->get($hotel->getId());
        $hotel->setPartner($partnerFacade);

        $this->update($hotel);
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