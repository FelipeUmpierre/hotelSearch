<?php

class CityFacadeTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $city = new Entity\City(1, "Brasil");

        $cityFacade = new Facade\CityFacade();
        $cityFacade->add($city);

        $testCity = $cityFacade->get(1);

        $this->assertNotNull($testCity);
        $this->assertEquals(1, $testCity->getId());
        $this->assertEquals("Brasil", $testCity->getName());
    }
}