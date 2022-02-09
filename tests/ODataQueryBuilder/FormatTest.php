<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Format
 */
final class FormatTest extends TestCase
{
    /**
     * @test
     */
    public function canSetFormatValue()
    {
        $sut      = new Format("json");
        $expected = '$format=json';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
