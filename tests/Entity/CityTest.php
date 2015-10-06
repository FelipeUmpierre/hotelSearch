<?php

use Entity\City;

class CityTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $city = new City(1, "Brasil");

        $this->assertEquals("Brasil", $city->getName());
        $this->assertEquals(1, $city->getId());
    }
}