<?php

namespace App\DataTable;

abstract class AbstractDataTable
{
    abstract protected function dataProvider(): array|DataProviderInterface;

    abstract protected function columns(): array;

    public function getData(): array
    {
        $provider = $this->dataProvider();

        if ($provider instanceof DataProviderInterface) {
            return $provider->provide();
        }

        return $provider;
    }

    public function getColumns(): array
    {
        return $this->columns();
    }
}