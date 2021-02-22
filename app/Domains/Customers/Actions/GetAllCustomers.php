<?php


namespace Domains\Customers\Actions;


use Domains\Customers\DataTransferObjects\CustomerDataCollection;
use Domains\Customers\Models\Customer;

final class GetAllCustomers extends \Parents\Actions\Action
{
    public function __invoke(): CustomerDataCollection
    {
        return CustomerDataCollection::fromCollection(Customer::all());
    }
}
