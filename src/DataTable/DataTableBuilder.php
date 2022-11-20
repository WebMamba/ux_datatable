<?php

namespace App\DataTable;

class DataTableBuilder
{
    private array $columns;

    private array $data;

    public function setColumns(array $columns): self
    {
        $this->columns = $columns;

        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getDataTable(): DataTable
    {
        return new DataTable($this->columns, $this->data);
    }
}