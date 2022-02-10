<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

abstract class EncodedQueryOption
{
    private string $key;

    private string $value;

    protected function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function build(): string
    {
        return sprintf(
            '$%s=%s',
            $this->key,
            rawurlencode($this->value)
        );
    }
}
