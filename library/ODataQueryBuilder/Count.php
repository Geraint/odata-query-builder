<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Count
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return $this->value
            ? '$count=true'
            : '$count=false';
    }
}
