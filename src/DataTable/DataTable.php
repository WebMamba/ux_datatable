<?php

namespace App\DataTable;

class DataTable
{
    public function __construct(
        private readonly array $columns,
        private readonly array|DataTableProviderInterface $data,
        private readonly int $pageSize = 5,
        private readonly bool $pagination = true,
    ) {
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getData(): array|DataTableProviderInterface
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
}