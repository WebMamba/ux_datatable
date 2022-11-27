<?php

namespace App\DataTable;

interface DataTableProviderInterface
{
    public function provide(int $offset = 0, ?int $pageSize = null, array $context = []): array;
}
