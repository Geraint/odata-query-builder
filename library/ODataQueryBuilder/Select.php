<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Select
{
    private string $value = '';


    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return '$select=' . rawurlencode($this->value);
    }
}
