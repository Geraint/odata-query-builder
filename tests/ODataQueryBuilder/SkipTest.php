<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Skip
 */
final class SkipTest extends TestCase
{
    /**
     * @test
     */
    public function canSetSkipValue(): void
    {
        $sut      = new Skip(99);
        $expected = '$skip=99';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
