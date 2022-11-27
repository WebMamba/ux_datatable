<?php

namespace App\DataTable;

class ProviderResolver
{
    public function __construct(
        private iterable $providers
    ) {}

    public function getProvider(string $className): ?DataTableProviderInterface
    {
        foreach ($this->providers as $provider) {
            if (get_class($provider) === $className) {
                return $provider;
            }
        }

        return null;
    }
}
