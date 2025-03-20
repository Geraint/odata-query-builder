<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\First
 */
final class FirstTest extends TestCase
{
    /**
     * @test
     */
    public function canSetFirstValue(): void
    {
        $sut      = new First(99);
        $expected = '$first=99';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
