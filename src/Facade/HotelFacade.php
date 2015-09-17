<?php

namespace Facade;

use Entity\Hotel;
use Entity\Partner;
use Service\HotelServiceInterface;

class HotelFacade implements HotelServiceInterface
{
    /**
     * @var \Entity\Hotel[]
     */
    private $hotel;

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

    /**
     * Will return a list of hotels by partner name
     *
     * @param $partnerName
     * @return \Entity\Hotel[]
     */
    public function getHotelFromPartnerName($partnerName)
    {
        // TODO: Implement getHotelFromPartnerName() method.
    }

    /**
     * Will return a list of hotels by price
     *
     * @param $price
     * @return \Entity\Hotel[]
     */
    public function getHotelByPrice($price)
    {
        // TODO: Implement getHotelByPrice() method.
    }
}