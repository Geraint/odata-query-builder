<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\ODataQueryBuilder
 */
final class SkipTest extends TestCase
{
    /**
     * @test
     */
    public function canSetSkipValue()
    {
        $sut      = new Skip(99);
        $expected = '$skip=99';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
