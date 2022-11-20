<?php

namespace App\DataTable;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('dataTable')]
class DataTableComponent
{
    public array $columns;

    public array|DataTableProviderInterface $data;

    #[PreMount]
    public function preMount(array $properties): array
    {
        $data = $properties['data'];
        if ($data instanceof DataTableProviderInterface) {
            $properties['data'] = $data->provide();
        }

        return $properties;
    }
}