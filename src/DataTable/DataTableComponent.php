<?php

namespace App\DataTable;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('dataTable')]
class DataTableComponent
{
    public array $columns;

    public array|DataTableProviderInterface $data;

    private int $pageSize = 5;

    private bool $pagination = true;

    private int $index = 0;

    #[PreMount]
    public function preMount(array $properties): array
    {
        $data = $properties['data'];

        if ($this->pagination) {
            $properties['data'] = array_slice($data, $this->pageSize * $this->index);

            return $properties;
        }

        $properties['data'] = $data;

        return $properties;
    }
}