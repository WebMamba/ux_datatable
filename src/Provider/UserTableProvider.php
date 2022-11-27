<?php

namespace App\Provider;

use App\DataTable\DataTableProviderInterface;
use App\Repository\UserRepository;

class UserTableProvider implements DataTableProviderInterface
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function provide(int $offset = 0, int $pageSize = null, array $context = []): array
    {
        return $this->userRepository->findBy([], null, $pageSize, $offset);
    }
}
