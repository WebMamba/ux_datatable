<?php

namespace App\DataTable;

use JetBrains\PhpStorm\Pure;

class DataTable
{
    public function __construct(
        private readonly array $columns,
        private readonly ?array $data,
        private readonly ?string $provider,
        private readonly int $pageSize = 5,
        private readonly bool $pagination = true,
    ) {
    }

    public static function create(array $columns, ?array $data, ?string $provider, int $pageSize, bool $pagination): self
    {
        return new self($columns, $data, $provider, $pageSize, $pagination);
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function withPagination(): bool
    {
        return $this->pagination;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }
}
