<?php

namespace App\DataTable;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('dataTable')]
class DataTableComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public array $columns = [];

    #[LiveProp(writable: true)]
    public array $data = [];

    #[LiveProp(writable: false)]
    public array|DataTableProviderInterface $provider = [];

    #[LiveProp(writable: false)]
    public int $pageSize = 3;

    #[LiveProp(writable: false)]
    public bool $pagination = true;

    #[LiveProp(writable: true)]
    public int $index = 0;

    #[LiveAction]
    public function next(): void
    {
        ++$this->index;

        if ($this->pagination) {
            $this->data = array_slice($this->provider, $this->pageSize * $this->index, $this->pageSize);
        }
    }

    #[LiveAction]
    public function previous(): void
    {
        --$this->index;

        if ($this->pagination) {
            $this->data = array_slice($this->provider, $this->pageSize * $this->index, $this->pageSize);
        }
    }

    #[PostMount]
    public function postMount(array $data): array
    {
        if ($this->pagination) {
            $this->data = array_slice($this->provider, $this->pageSize * $this->index, $this->pageSize);
        }

        return [];
    }
}
