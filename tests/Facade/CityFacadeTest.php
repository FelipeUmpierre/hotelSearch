<?php

use Entity\City;
use Entity\Hotel;
use Facade\CityFacade;
use Facade\HotelFacade;

class CityFacadeTest extends PHPUnit_Framework_TestCase
{
    public function testCity()
    {
        $city = new City(15475, 'Düsseldorf');

        $cityFacade = new CityFacade();
        $cityFacade->add($city);

        return $cityFacade;
    }

    /**
     * @depends testCity
     */
    public function testAdd(CityFacade $cityFacade)
    {
        $city = $cityFacade->get(15475);

        $this->assertInstanceOf('Entity\City', $city);
        $this->assertEquals(15475, $city->getId());
        $this->assertEquals('Düsseldorf', $city->getName());
    }

    /**
     * @depends testCity
     */
    public function testUpdate(CityFacade $cityFacade)
    {
        $city = $cityFacade->get(15475);
        $city->setName('Airbnb');

        $cityFacade->update($city);

        $updatedCity = $cityFacade->get(15475);

        $this->assertEquals('Airbnb', $updatedCity->getName());
    }

    /**
     * @depends testCity
     */
    public function testAddHotel(CityFacade $cityFacade)
    {
        $city = $cityFacade->get(15475);

        $hotel = new Hotel(1, 'Hilton Düsseldorf', 'Georg-Glock-Straße 20, 40474 Düsseldorf');

        $hotelFacade = new HotelFacade();
        $hotelFacade->add($hotel);

        $cityFacade->addHotel($city, $hotelFacade);

        $city = $cityFacade->get(15475);

        $this->assertInternalType('array', $city->getHotel());
        $this->assertInstanceOf('Facade\HotelFacade', $city->getHotel()[0]);
    }

    /**
     * @depends testCity
     */
    public function testDelete(CityFacade $cityFacade)
    {
        $cityFacade->delete(15475);

        $city = $cityFacade->get(15475);

        $this->assertNotInstanceOf('Entity\City', $city);
    }
}