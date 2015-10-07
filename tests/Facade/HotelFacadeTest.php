<?php

use Entity\Hotel;
use Facade\HotelFacade;

class HotelFacadeTest extends PHPUnit_Framework_TestCase
{
    public function testHotel()
    {
        $hotel = new Hotel(1, 'Hilton Düsseldorf', 'Georg-Glock-Straße 20, 40474 Düsseldorf');

        $hotelFacade = new HotelFacade();
        $hotelFacade->add($hotel);

        return $hotelFacade;
    }

    /**
     * @depends testHotel
     */
    public function testAdd(HotelFacade $hotelFacade)
    {
        $hotel = $hotelFacade->get(1);

        $this->assertInstanceOf('Entity\Hotel', $hotel);
        $this->assertEquals(1, $hotel->getId());
        $this->assertEquals('Hilton Düsseldorf', $hotel->getName());
        $this->assertEquals('Georg-Glock-Straße 20, 40474 Düsseldorf', $hotel->getAddress());
    }

    /**
     * @depends testHotel
     */
    public function testUpdate(HotelFacade $hotelFacade)
    {
        $hotel = $hotelFacade->get(1);
        $hotel->setName('Airbnb');

        $hotelFacade->update($hotel);

        $updatedHotel = $hotelFacade->get(1);

        $this->assertEquals('Airbnb', $updatedHotel->getName());
    }

    /**
     * @depends testHotel
     */
    public function testDelete(HotelFacade $hotelFacade)
    {
        $hotelFacade->delete(1);

        $hotel = $hotelFacade->get(1);

        $this->assertNotInstanceOf('Entity\Hotel', $hotel);
    }
}