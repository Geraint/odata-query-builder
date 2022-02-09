<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class ODataQueryBuilder
{
    private string $serviceRootUrl;
    private string $resourcePath;
    private ?Filter $filter = null;
    private ?Format $format = null;

    public function __construct(string $serviceRootUrl, string $resourcePath)
    {
        $this->serviceRootUrl = $serviceRootUrl;
        $this->resourcePath = $resourcePath;
    }

    public function filter(string $value): self
    {
        $this->filter = new Filter($value);
        return $this;
    }

    public function format(string $value): self
    {
        $this->format = new Format($value);
        return $this;
    }

    public function build(): string
    {
        return $this->serviceRootUrl . $this->resourcePath . $this->maybeMakeQueryString();
    }

    private function maybeMakeQueryString(): string
    {
        $queryOptions = [];
        if (!is_null($this->filter)) {
            $queryOptions[] = $this->filter->build();
        }
        if (!is_null($this->format)) {
            $queryOptions[] = $this->format->build();
        }
        if (empty($queryOptions)) {
            return '';
        }
        return '?' . implode('&', $queryOptions);
    }
}
