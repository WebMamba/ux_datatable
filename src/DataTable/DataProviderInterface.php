<?php

namespace App\DataTable;

interface DataProviderInterface
{
    public function provide(): array;
}