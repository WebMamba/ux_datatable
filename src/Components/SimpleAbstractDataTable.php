<?php

namespace App\Components;

use App\DataTable\DataProviderInterface;
use App\DataTable\AbstractDataTable;
use App\Provider\SimpleProvider;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('simple_component')]
class SimpleAbstractDataTable extends AbstractDataTable
{
    protected function dataProvider(): array|DataProviderInterface
    {
        return new SimpleProvider();
    }

    protected function columns(): array
    {
        return ['id', 'firstName', 'lastName'];
    }
}