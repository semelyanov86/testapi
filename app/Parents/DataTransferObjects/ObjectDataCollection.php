<?php


namespace Parents\DataTransferObjects;


use Illuminate\Support\Collection;

class ObjectDataCollection extends \Spatie\DataTransferObject\DataTransferObjectCollection
{
    public function toCollection(): Collection
    {
        return collect($this->items());
    }
}
