<?php


namespace Domains\Customers\Tasks;


use Domains\Customers\DataTransferObjects\CustomerData;
use Domains\Customers\Models\Customer;
use Illuminate\Support\Collection;

final class CreateCustomersFromCollectionTask extends \Parents\Tasks\Task
{
    public function run(Collection $customers): Collection
    {
        return $customers->map(function(CustomerData $customer) {
            return Customer::updateOrCreate(
                ['email' => $customer->email],
                $customer->toArray()
            );
        });
    }
}
