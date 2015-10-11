<?php

namespace Facade;

use Dao\HotelDao;
use Entity\Hotel;
use Entity\Partner;

class HotelFacade
{
    /**
     * @var \Dao\HotelDao
     */
    private $hotelDao;

    public function __construct()
    {
        if (null == $this->hotelDao) {
            $this->hotelDao = new HotelDao();
        }
    }

    /**
     * Insert a new item in the array
     *
     * @param Hotel $hotel
     */
    public function add(Hotel $hotel)
    {
        $this->hotelDao->add($hotel);
    }

    /**
     * Add a PartnerFacade to a Hotel
     *
     * @param Hotel $hotel
     * @param PartnerFacade $partnerFacade
     */
    public function addPartner(Hotel $hotel, PartnerFacade $partnerFacade)
    {
        $this->hotelDao->addPartner($hotel, $partnerFacade);
    }

    /**
     * Update an item from the array
     *
     * @param Hotel $hotel
     */
    public function update(Hotel $hotel)
    {
        $this->hotelDao->update($hotel);
    }

    /**
     * Delete a hotel passing the id from the hotel
     *
     * @param int $id Hotel id
     * @return bool
     */
    public function delete($id)
    {
        return $this->hotelDao->delete($id);
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Hotel
     */
    public function get($id)
    {
        return $this->hotelDao->get($id);
    }

    /**
     * Return all
     *
     * @return \Entity\Hotel[]
     */
    public function getAll()
    {
        return $this->hotelDao->getAll();
    }

    /**
     * @param $partnerName
     * @return \Entity\Hotel[]
     */
    public function getHotelFromPartnerName($partnerName)
    {
        return $this->hotelDao->getHotelFromPartnerName($partnerName);
    }
}