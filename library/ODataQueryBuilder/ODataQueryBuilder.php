<?php

declare(strict_types=1);

namespace ODataQueryBuilder;

class ODataQueryBuilder
{
    private ServiceRootUrl $serviceRootUrl;
    private string $resourcePath;
    private ?Filter $filter = null;
    private ?Expand $expand = null;
    private ?Select $select = null;
    private ?OrderBy $orderBy = null;
    private ?Top $top = null;
    private ?Skip $skip = null;
    private ?Count $count = null;
    private ?Search $search = null;
    private ?Format $format = null;

    public function __construct(string $serviceRootUrl, string $resourcePath)
    {
        $this->serviceRootUrl = new ServiceRootUrl($serviceRootUrl);
        $this->resourcePath = $resourcePath;
    }

    public function filter(string $value): self
    {
        $this->filter = new Filter($value);
        return $this;
    }

    public function expand(string $value): self
    {
        $this->expand = new Expand($value);
        return $this;
    }

    public function select(string $value): self
    {
        $this->select = new Select($value);
        return $this;
    }

    public function orderBy(string $value): self
    {
        $this->orderBy = new OrderBy($value);
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

    public function count(bool $value): self
    {
        $this->count = new Count($value);
        return $this;
    }

    public function search(string $value): self
    {
        $this->search = new Search($value);
        return $this;
    }

    public function format(string $value): self
    {
        $this->format = new Format($value);
        return $this;
    }

    public function build(): string
    {
        return $this->serviceRootUrl->build() . $this->resourcePath . $this->maybeMakeQueryString();
    }

    private function maybeMakeQueryString(): string
    {
        $queryOptions = [];

        $optionBulders = [
            $this->filter,
            $this->expand,
            $this->select,
            $this->orderBy,
            $this->top,
            $this->skip,
            $this->count,
            $this->search,
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
