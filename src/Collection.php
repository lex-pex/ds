<?php

namespace DataStructures;

class Collection
{
    protected array $items = [];

    public function size(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
