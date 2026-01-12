<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Apply extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('apply', $value);
    }
}
