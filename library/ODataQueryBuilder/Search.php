<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Search extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('search', $value);
    }
}
