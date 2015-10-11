<?php

use Entity\Partner;
use Entity\Hotel;
use Facade\PartnerFacade;
use Facade\HotelFacade;

class PartnerFacadeTest extends PHPUnit_Framework_TestCase
{
    public function testPartner()
    {
        $partnerFacade = new PartnerFacade();

        $partner = new Partner(1, 'Partner #1', 'homepage #1');
        $partner2 = new Partner(2, 'Partner #2', 'homepage #2');
        $partner3 = new Partner(3, 'Felipe', 'homepage #3');

        $partnerFacade->add($partner)->add($partner2)->add($partner3);

        return $partnerFacade;
    }

    /**
     * @depends testPartner
     */
    public function testSearchPartner(PartnerFacade $partnerFacade)
    {
        $partner = $partnerFacade->getPartnerByName('Felipe');

        $this->assertInstanceOf('Entity\Partner', $partner);
        $this->assertEquals('Felipe', $partner->getName());
        $this->assertEquals(3, $partner->getId());
    }

    /**
     * @depends testPartner
     * @param PartnerFacade $partnerFacade
     */
    public function testHotelSearchPartner(PartnerFacade $partnerFacade)
    {
        $hotelFacade = new HotelFacade();

        $hotel = new Hotel(1, 'hotel 1', 'hotel 1 - 1');
        $hotel2 = new Hotel(2, 'hotel 2', 'hotel 2 - 2');
        $hotel3 = new Hotel(3, 'hotel 3', 'hotel 3 - 3');

        // add hotel and partner
        $hotelFacade->add($hotel);
        $hotelFacade->addPartner($hotel, $partnerFacade);

        $hotelFacade->add($hotel2);

        $hotelFacade->add($hotel3);
        $hotelFacade->addPartner($hotel3, $partnerFacade);

        $hotelFacade->getHotelFromPartnerName('Felipe');
    }
}