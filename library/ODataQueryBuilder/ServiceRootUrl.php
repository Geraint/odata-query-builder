<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class ServiceRootUrl
{
    private string $value = '';


    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function build(): string
    {
        return sprintf(
            '%s%s',
            $this->value,
            $this->hasTrailingSlash() ? '' : '/'
        );
    }

    private function hasTrailingSlash(): bool
    {
        return substr($this->value, -1) === '/';
    }
}
