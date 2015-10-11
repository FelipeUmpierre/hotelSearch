<?php

namespace Service;

use Entity\Partner;

interface PartnerServiceInterface
{
    /**
     * Will return the partner by name
     *
     * @param $partnerName
     * @return Partner|null
     */
    public function getPartnerByName($partnerName);
}