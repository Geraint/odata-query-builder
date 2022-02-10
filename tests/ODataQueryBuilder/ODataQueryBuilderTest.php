<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\ODataQueryBuilder
 */
final class ODataQueryBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function canBuildQueryWithFilter()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27';
        $actual = $sut
            ->filter("FirstName eq 'Scott'")
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithExpand()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", "People('russelwhyte')");
        $expected = "https://services.odata.org/V4/TripPinService/People('russelwhyte')?\$expand=Friends";
        $actual = $sut
            ->expand('Friends')
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithSelect()
    {
        $sut = new ODataQueryBuilder('https://services.odata.org/V4/TripPinService/', 'Airports');
        $expected = 'https://services.odata.org/V4/TripPinService/Airports?$select=Name%2C%20IcaoCode';
        $actual = $sut
            ->select('Name, IcaoCode')
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithTop()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$top=2';
        $actual = $sut
            ->top(2)
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithSkip()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$skip=2';
        $actual = $sut
            ->skip(2)
            ->build();
        $this->assertSame($expected, $actual);
    }

    public function canBuildQueryWithTopAndSkip()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$top=5&$skip=10';
        $actual = $sut
            ->top(5)
            ->skip(10)
            ->build();
        $this->assertSame($expected, $actual);
    }

     /**
     * @test
     */
    public function canBuildQueryWithFilterAndFormat()
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        //phpcs:disable
        $expected = 'https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27&$format=json';
        //phpcs:enable
        $actual = $sut
            ->filter("FirstName eq 'Scott'")
            ->format('json')
            ->build();
        $this->assertSame($expected, $actual);
    }
}
