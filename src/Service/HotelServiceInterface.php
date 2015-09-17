<?php

namespace Service;

interface HotelServiceInterface
{
    /**
     * Will return a list of hotels by partner name
     *
     * @param $partnerName
     * @return \Entity\Hotel[]
     */
    public function getHotelFromPartnerName($partnerName);

    /**
     * Will return a list of hotels by price
     *
     * @param $price
     * @return \Entity\Hotel[]
     */
    public function getHotelByPrice($price);
}