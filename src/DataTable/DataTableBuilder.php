<?php

namespace App\DataTable;

class DataTableBuilder
{
    public function build(array|DataProviderInterface $provider, $columns): DataTable
    {
        return new DataTable($provider, $columns);
    }
}