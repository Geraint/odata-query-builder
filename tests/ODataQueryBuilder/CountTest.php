<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Count
 */
final class CountTest extends TestCase
{
    /**
     * @test
     */
    public function canSetCountValue()
    {
        $sut      = new Count(true);
        $expected = '$count=true';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
