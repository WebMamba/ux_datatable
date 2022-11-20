<?php

namespace App\Provider;

use App\DataTable\DataTableProviderInterface;

class UserTableProvider implements DataTableProviderInterface
{
    public function provide(): array
    {
        return [
            ['id' => 3, 'firstName' => 'Mathew', 'lastName' => 'French'],
            ['id' => 4, 'firstName' => 'Bob', 'lastName' => 'Dog']
        ];
    }
}