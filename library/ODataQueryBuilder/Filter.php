<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Filter extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('filter', $value);
    }
}
