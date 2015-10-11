<?php

namespace Dao;

use Entity\Partner;
use Facade\PriceFacade;
use Service\PartnerServiceInterface;

class PartnerDao implements PartnerServiceInterface
{
    /**
     * @var \Entity\Partner[]
     */
    private $partner;

    /**
     * Insert a new item in the array
     *
     * @param Partner $partner
     */
    public function add(Partner $partner)
    {
        $this->partner[$partner->getId()] = $partner;
    }

    /**
     * Add a PriceFacade to a Partner
     *
     * @param Partner $partner
     * @param PriceFacade $priceFacade
     */
    public function addPrice(Partner $partner, PriceFacade $priceFacade)
    {
        $partner = $this->get($partner->getId());
        $partner->setPrice($priceFacade);

        $this->update($partner);
    }

    /**
     * Update an item from the array
     *
     * @param Partner $partner
     */
    public function update(Partner $partner)
    {
        $this->add($partner);
    }

    /**
     * Delete a partner passing the id from the partner
     *
     * @param int $id Partner id
     * @return bool
     */
    public function delete($id)
    {
        if ($this->get($id)) {
            unset($this->partner[$id]);

            return true;
        }

        return false;
    }

    /**
     * Return one item from the array, if found
     *
     * @param int $id
     * @return \Entity\Partner
     */
    public function get($id)
    {
        if (isset($this->partner[$id]))
            return $this->partner[$id];

        return null;
    }

    /**
     * Return all
     *
     * @return \Entity\Partner[]
     */
    public function getAll()
    {
        return $this->partner;
    }

    /**
     * Will return the partner by name
     *
     * @param $partnerName
     * @return Partner|null
     */
    public function getPartnerByName($partnerName)
    {
        if (!empty($this->partner)) {
            foreach ($this->partner as $key => $partner) {
                if ($partner->getName() == $partnerName) {
                    return $partner;
                }
            }
        }

        return null;
    }
}