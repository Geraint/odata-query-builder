<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class Inlinecount extends EncodedQueryOption
{
    public function __construct(string $value)
    {
        parent::__construct('inlinecount', $value);
    }
}
