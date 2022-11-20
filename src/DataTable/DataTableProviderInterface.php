<?php

namespace App\DataTable;

interface DataTableProviderInterface
{
    public function provide(): array;
}