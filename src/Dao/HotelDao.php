<?php

namespace Dao;

use Entity\Hotel;
use Facade\PartnerFacade;
use Service\HotelServiceInterface;

class HotelDao implements HotelServiceInterface
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

    /**
     * Will return a list of hotels by partner name
     *
     * @param string $partnerName
     * @return array of Hotel
     */
    public function getHotelFromPartnerName($partnerName)
    {
        $hotels = [];

        // check if the hotel main array isn't empty
        if (!empty($this->hotel)) {
            // loop through the array
            foreach ($this->hotel as $hotelKey => $hotel) {
                // check if the hotel has at least one
                // partner added
                if (!empty($hotel->getPartner())) {
                    // loop through the partners
                    foreach ($hotel->getPartner() as $partnerKey => $partner) {
                        // check if has any partner with the name
                        // that came as parameter
                        if ($partner->getPartnerByName($partnerName)) {
                            // if has one with the name, get the
                            // object of the hotel and add to the
                            // hotels array
                            $hotels[] = $hotel;
                        }
                    }
                }
            }
        }

        return $hotels;
    }
}