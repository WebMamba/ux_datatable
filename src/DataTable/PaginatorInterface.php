<?php

namespace App\DataTable;

interface PaginatorInterface
{
    public function next(): void;

    public function previous(): void;

    public function getNumberOfItemByPage(): int;

    public function getCurrentPage(array|DataTableProviderInterface $data, int $page): array;
}