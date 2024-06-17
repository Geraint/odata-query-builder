<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\ODataQueryBuilder
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
final class ODataQueryBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function canBuildQueryWithFilter(): void
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
    public function canBuildQueryWithExpand(): void
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
    public function canBuildQueryWithSelect(): void
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
    public function canBuildQueryWithOrderBy(): void
    {
        $sut = new ODataQueryBuilder('https://services.odata.org/V4/TripPinService/', 'Airports');
        $expected = 'https://services.odata.org/V4/TripPinService/Airports?$orderby=Name%20desc';
        $actual = $sut
            ->orderBy('Name desc')
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithTop(): void
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
    public function canBuildQueryWithSkip(): void
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$skip=2';
        $actual = $sut
            ->skip(2)
            ->build();
        $this->assertSame($expected, $actual);
    }

    public function canBuildQueryWithTopAndSkip(): void
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
    public function canBuildQueryWithCount(): void
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$count=true';
        $actual = $sut
            ->count(true)
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildQueryWithSearch(): void
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$search=United%20States';
        $actual = $sut
            ->search('United States')
            ->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function canBuildWithInlinecount(): void
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        $expected = 'https://services.odata.org/V4/TripPinService/People?$inlinecount=allpages';
        $actual = $sut
            ->inlinecount('allpages')
            ->build();
        $this->assertSame($expected, $actual);
    }

     /**
     * @test
     */
    public function canBuildQueryWithFilterAndFormat(): void
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

    /**
     * @test
     */
    public function canBuildComplexQuery(): void
    {
        $sut = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
        //phpcs:disable
        $expected = 'https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27&$select=UserName%2C%20LastName%2C%20FirstName&$orderby=LastName%20asc&$format=json';
        //phpcs:enable
        $actual = $sut
            ->filter("FirstName eq 'Scott'")
            ->select('UserName, LastName, FirstName')
            ->orderBy('LastName asc')
            ->format('json')
            ->build();
        $this->assertSame($expected, $actual);
    }
}
