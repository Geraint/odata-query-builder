<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Select
 */
final class SelectTest extends TestCase
{
    /**
     * @test
     */
    public function canEncodeSelectValue(): void
    {
        $sut      = new Select('Name, IcaoCode');
        $expected = '$select=Name%2C%20IcaoCode';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
