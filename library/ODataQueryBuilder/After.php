<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class After
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return '$after=' . $this->value;
    }
}
