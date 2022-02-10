<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class ODataQueryBuilder
{
    private string $serviceRootUrl;
    private string $resourcePath;
    private ?Filter $filter = null;
    private ?Top $top = null;
    private ?Skip $skip = null;
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

    public function top(int $value): self
    {
        $this->top = new Top($value);
        return $this;
    }

    public function skip(int $value): self
    {
        $this->skip = new Skip($value);
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

        $optionBulders = [
            $this->filter,
            $this->top,
            $this->skip,
            $this->format,
        ];

        foreach ($optionBulders as $builder) {
            if (!is_null($builder)) {
                $queryOptions[] = $builder->build();
            }
        }

        return empty($queryOptions)
            ? ''
            : '?' . implode('&', $queryOptions);
    }
}
