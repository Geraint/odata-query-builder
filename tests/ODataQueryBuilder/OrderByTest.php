<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\OrdersBy
 */
final class OrderByTest extends TestCase
{
    /**
     * @test
     */
    public function canEncodeOrdersByValue()
    {
        $sut      = new OrderBy('EndsAt desc');
        $expected = '$orderby=EndsAt%20desc';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
