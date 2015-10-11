<?php

namespace Facade;

use Dao\PartnerDao;
use Entity\Partner;

class PartnerFacade
{
    /**
     * @var \Dao\PartnerDao
     */
    private $partnerDao;

    public function __construct()
    {
        if (null == $this->partnerDao) {
            $this->partnerDao = new PartnerDao();
        }
    }

    /**
     * Insert a new item in the array
     *
     * @param Partner $partner
     * @return $this
     */
    public function add(Partner $partner)
    {
        $this->partnerDao->add($partner);

        return $this;
    }

    /**
     * Add a PriceFacade to a Partner
     *
     * @param Partner $partner
     * @param PriceFacade $priceFacade
     */
    public function addPrice(Partner $partner, PriceFacade $priceFacade)
    {
        $this->partnerDao->addPrice($partner, $priceFacade);
    }

    /**
     * Update an item from the array
     *
     * @param Partner $partner
     */
    public function update(Partner $partner)
    {
        $this->partnerDao->update($partner);
    }

    /**
     * Delete a partner passing the id from the partner
     *
     * @param int $id Partner id
     * @return bool
     */
    public function delete($id)
    {
        return $this->partnerDao->delete($id);
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Partner
     */
    public function get($id)
    {
        return $this->partnerDao->get($id);
    }

    /**
     * Return all
     *
     * @return \Entity\Partner[]
     */
    public function getAll()
    {
        return $this->partnerDao->getAll();
    }

    /**
     * Will return the partner by name
     *
     * @param $partnerName
     * @return Partner|null
     */
    public function getPartnerByName($partnerName)
    {
        return $this->partnerDao->getPartnerByName($partnerName);
    }
}