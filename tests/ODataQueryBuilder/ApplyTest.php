<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ODataQueryBuilder\Apply
 */
final class ApplyTest extends TestCase
{
    /**
     * @test
     */
    public function canSetApplyValue(): void
    {
        $sut      = new Apply('groupby((stndrdAttndcModeTypeNr))');
        $expected = '$apply=groupby%28%28stndrdAttndcModeTypeNr%29%29';
        $actual   = $sut->build();
        $this->assertSame($expected, $actual);
    }
}
