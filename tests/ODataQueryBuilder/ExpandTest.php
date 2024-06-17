<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Expand
 */
final class ExpandTest extends TestCase
{
    /**
     * @test
     */
    public function canSetExpandValue(): void
    {
        $sut      = new Expand('Friends');
        $expected = '$expand=Friends';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
