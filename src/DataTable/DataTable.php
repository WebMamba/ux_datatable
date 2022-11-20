<?php

namespace App\DataTable;

class DataTable
{
    public function __construct(
        private array $columns,
        private array|DataTableProviderInterface $data
    ) {
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }

    public function getData(): array|DataTableProviderInterface
    {
        return $this->data;
    }

    public function setData(array|DataTableProviderInterface $data): void
    {
        $this->data = $data;
    }
}