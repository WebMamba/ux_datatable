<?php

namespace App\DataTable;

abstract class DataTable
{
    public function __construct(
        private readonly array $data,
        private readonly array $columns
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }
}