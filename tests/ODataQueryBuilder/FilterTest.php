<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Filter
 */
final class FilterTest extends TestCase
{
    /**
     * @test
     */
    public function canEncodeFilterValue(): void
    {
        $sut      = new Filter("JacsCode eq 'G400'");
        $expected = '$filter=JacsCode%20eq%20%27G400%27';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
