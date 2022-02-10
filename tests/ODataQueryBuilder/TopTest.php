<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\ODataQueryBuilder
 */
final class TopTest extends TestCase
{
    /**
     * @test
     */
    public function canSetTopValue()
    {
        $sut      = new Top(99);
        $expected = '$top=99';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
