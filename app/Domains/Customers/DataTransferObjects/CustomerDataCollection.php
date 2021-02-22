<?php


namespace Domains\Customers\DataTransferObjects;


use Domains\Customers\Models\Customer;
use Illuminate\Support\Collection;

final class CustomerDataCollection extends \Parents\DataTransferObjects\ObjectDataCollection
{
    public function current(): CustomerData
    {
        return parent::current();
    }

    /**
     * @param  Customer[]  $data
     * @return CustomerDataCollection
     */
    public static function fromArray(array $data): CustomerDataCollection
    {
        return new self(
            array_map(fn(Customer $item) => CustomerData::createFromModel($item), $data)
        );
    }

    /**
     * @param  Customer[]  $data
     * @return CustomerDataCollection
     */
    public static function fromCollection(Collection $data): CustomerDataCollection
    {
        $newData = $data->map(fn(Customer $item) => CustomerData::createFromModel($item));
        return new self(
            $newData->toArray()
        );
    }
}
