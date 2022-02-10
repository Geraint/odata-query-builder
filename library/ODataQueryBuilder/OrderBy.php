<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class OrderBy extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('orderby', $value);
    }
}
