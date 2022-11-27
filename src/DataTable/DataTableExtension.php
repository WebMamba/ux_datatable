<?php

namespace App\DataTable;

use Symfony\UX\TwigComponent\ComponentRendererInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DataTableExtension extends AbstractExtension
{
    public function __construct(
        private readonly ComponentRendererInterface $componentRenderer
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('dataTable', [$this, 'createDataTable'], ['is_safe' => ['html']])
        ];
    }

    public function createDataTable(DataTable $dataTable): string
    {
        return $this->componentRenderer->createAndRender('dataTable', [
            'data' => $dataTable->getData(),
            'columns' => $dataTable->getColumns(),
            'provider' => $dataTable->getProvider(),
            'pageSize' => $dataTable->getPageSize(),
            'pagination' => $dataTable->withPagination()
        ]);
    }
}
