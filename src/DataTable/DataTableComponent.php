<?php

namespace App\DataTable;

use Exception;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('dataTable')]
class DataTableComponent
{
    use DefaultActionTrait;

    public function __construct(
        private DataTableHandler $dataTableHandler
    ) {}

    #[LiveProp(writable: false)]
    public array $columns = [];

    #[LiveProp(writable: true)]
    public ?array $data = null;

    #[LiveProp(writable: false)]
    public ?string $provider = null;

    #[LiveProp(writable: false)]
    public int $pageSize = 3;

    #[LiveProp(writable: false)]
    public bool $pagination = true;

    #[LiveProp(writable: true)]
    public int $index = 0;

    /**
     * @throws Exception
     */
    #[LiveAction]
    public function next(): void
    {
        ++$this->index;

        $this->data = $this->dataTableHandler->getPage(
            DataTable::create($this->columns, $this->data, $this->provider, $this->pageSize, $this->pagination),
            $this->index
        );
    }

    /**
     * @throws Exception
     */
    #[LiveAction]
    public function previous(): void
    {
        --$this->index;

        $this->data = $this->dataTableHandler->getPage(
            DataTable::create($this->columns, $this->data, $this->provider, $this->pageSize, $this->pagination),
            $this->index
        );
    }

    /**
     * @throws Exception
     */
    #[PostMount]
    public function postMount(array $data): array
    {
        $this->data = $this->dataTableHandler->getPage(
            DataTable::create($this->columns, $this->data, $this->provider, $this->pageSize, $this->pagination),
            $this->index
        );

        return [];
    }
}
