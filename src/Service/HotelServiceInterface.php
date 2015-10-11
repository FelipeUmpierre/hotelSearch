<?php

namespace Service;

interface HotelServiceInterface
{
    /**
     * Will return a list of hotels by partner name
     *
     * @param $partnerName
     * @return array of Hotel
     */
    public function getHotelFromPartnerName($partnerName);
}