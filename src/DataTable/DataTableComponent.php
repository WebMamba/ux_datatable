<?php

namespace App\DataTable;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('dataTable')]
class DataTableComponent
{
    public array $columns;

    public array $data;
}