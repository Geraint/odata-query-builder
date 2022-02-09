<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Format
{
    private string $value = '';


    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return '$format=' . $this->value;
    }
}
