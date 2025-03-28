<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\After
 */
final class AfterTest extends TestCase
{
    /**
     * @test
     */
    public function canSetAfterValue(): void
    {
        $sut      = new After('foobar-continuation-token');
        $expected = '$after=foobar-continuation-token';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
