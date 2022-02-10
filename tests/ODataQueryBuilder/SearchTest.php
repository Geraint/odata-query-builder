<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Search
 */
final class SearchTest extends TestCase
{
    /**
     * @test
     */
    public function canEncodeSearchValue()
    {
        $sut      = new Search('United States');
        $expected = '$search=United%20States';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
