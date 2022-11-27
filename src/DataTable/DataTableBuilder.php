<?php

namespace App\DataTable;

class DataTableBuilder
{
    private array $columns;

    private ?array $data = null;

    private ?string $provider = null;

    private int $pageSize = 5;

    private bool $pagination = true;

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

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function setPageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    public function withPagination(bool $pagination): self
    {
        $this->pagination = $pagination;

        return $this;
    }

    public function getDataTable(): DataTable
    {
        return new DataTable($this->columns, $this->data, $this->provider, $this->pageSize, $this->pagination);
    }
}
