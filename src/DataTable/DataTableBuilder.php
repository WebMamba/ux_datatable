<?php

namespace App\DataTable;

class DataTableBuilder
{
    public function build(array|DataProviderInterface $provider, $columns): AbstractDataTable
    {
        return new AbstractDataTable($provider, $columns);
    }
}