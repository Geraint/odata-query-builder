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
