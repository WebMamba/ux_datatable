<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('simple_component')]
class SimpleDataTable
{
    public function getData(): array
    {
        return [
            ['id' => 2, 'firstName' => 'Niels', 'lastName' => 'Bou'],
            ['id' => 3, 'firstName' => 'Bob', 'lastName' => 'Hey']
        ];
    }

    public function getColumns(): array
    {
        return ['id', 'firstName', 'lastName'];
    }
}