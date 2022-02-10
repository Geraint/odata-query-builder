<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Select extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('select', $value);
    }
}
