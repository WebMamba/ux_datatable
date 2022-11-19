<?php

namespace App\Provider;

use App\DataTable\DataProviderInterface;

class SimpleProvider implements DataProviderInterface
{
    public function provide(): array
    {
        return [
            ['id' => 1, 'firstName' => 'Bob', 'lastName' => 'Jean'],
            ['id' => 2, 'firstName' => 'Coco', 'lastName' => 'Zob']
        ];
    }
}