<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class First
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return '$first=' . $this->value;
    }
}
