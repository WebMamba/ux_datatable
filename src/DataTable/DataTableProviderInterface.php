<?php

namespace App\DataTable;

interface DataTableProviderInterface
{
    public function provide(int $offset, int $pageSize, array $context = []): array;
}
