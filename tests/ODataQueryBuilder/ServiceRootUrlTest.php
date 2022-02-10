<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\ServiceRootUrl
 */
final class ServiceRootUrlTest extends TestCase
{
    /**
     * @test
     */
    public function canBuildAsIs()
    {
        $sut      = new ServiceRootUrl("https://services.odata.org/V4/TripPinService/");
        $expected = 'https://services.odata.org/V4/TripPinService/';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function willAppendTrailingSlashIfMissing()
    {
        $sut      = new ServiceRootUrl("https://services.odata.org/V4/TripPinService");
        $expected = 'https://services.odata.org/V4/TripPinService/';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
