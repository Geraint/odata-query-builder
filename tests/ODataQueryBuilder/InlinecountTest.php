<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Inlinecount
 */
final class InlinecountTest extends TestCase
{
    /**
     * @test
     */
    public function canEncodeInlinecountValue()
    {
        $sut      = new Inlinecount("allpages");
        $expected = '$inlinecount=allpages';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
