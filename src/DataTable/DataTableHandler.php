<?php

namespace App\DataTable;

use Exception;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Psr\Container\ContainerInterface;

class DataTableHandler
{
    public function __construct(
        private ProviderResolver $providerResolver
    ) {}

    /**
     * @throws Exception
     */
    public function getPage(DataTable $dataTable, int $index): array
    {
        $data = $this->getData($dataTable, $index);

        return $this->mapToCols($data, $dataTable->getColumns());
    }

    /**
     * @throws Exception
     */
    public function getData(DataTable $dataTable, int $index): array
    {
        if ($dataTable->withPagination()) {
            if (null !== $dataTable->getProvider()) {
                $provider = $this->getProvider($dataTable);

                return $provider->provide($dataTable->getPageSize() * $index, $dataTable->getPageSize());
            }

            return array_slice($dataTable->getData(), $dataTable->getPageSize() * $index, $dataTable->getPageSize());
        }

        if (null !== $dataTable->getProvider()) {
            $provider = $this->getProvider($dataTable);

            return $provider->provide();
        }

        return $dataTable->getData();
    }

    public function mapToCols(array $data, array $cols): array
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->enableExceptionOnInvalidIndex()
            ->getPropertyAccessor()
        ;

        $results = [];
        foreach ($data as $rowData) {
            $row = [];
            if (is_object($rowData)) {
                foreach ($cols as $col) {
                    $value = $propertyAccessor->getValue($rowData, $col);
                    $row[$col] = $value;
                }
            }
            if (is_array($rowData)) {
                foreach ($cols as $col) {
                    $value = $propertyAccessor->getValue($rowData, sprintf('[%s]', $col));
                    $row[$col] = $value;
                }
            }
            $results[] = $row;
        }

        return $results;
    }

    /**
     * @throws Exception
     */
    private function getProvider(DataTable $dataTable): DataTableProviderInterface
    {
        $provider = $this->providerResolver->getProvider($dataTable->getProvider());
        if ($provider === null) {
            throw new \LogicException('provider should implements DataTableProviderInterface');
        }

        return $provider;
    }
}
