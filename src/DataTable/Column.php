<?php

namespace App\DataTable;

class Column
{
    private function __construct(
        private string $label, 
        private ?string $field,
        private ?array $format
    ) {
    }
    
    public function getLabel(): string
    {
        return $this->label;
    }
    
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
    
    public function getField(): ?string
    {
        return $this->field;
    }
    
    public function setField(?string $field): void
    {
        $this->field = $field;
    }
    
    public function getFormat(): ?array
    {
        return $this->format;
    }
    
    public function setFormat(?array $format): void
    {
        $this->format = $format;
    }
}