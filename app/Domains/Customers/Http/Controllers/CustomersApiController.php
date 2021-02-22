<?php


namespace Domains\Customers\Http\Controllers;


use Domains\Customers\Actions\GetAllCustomers;
use Domains\Customers\Actions\ShowCustomerAction;
use Domains\Customers\DataTransferObjects\CustomerData;
use Domains\Customers\Models\Customer;
use Domains\Customers\Transformers\CustomerFullDataTransformer;
use Domains\Customers\Transformers\CustomerTransformer;

class CustomersApiController extends \Parents\Controllers\ApiController
{
    public function index(GetAllCustomers $action): \Illuminate\Http\JsonResponse
    {
        return fractal($action(), new CustomerTransformer())->respond();
    }

    public function show(Customer $customer): \Illuminate\Http\JsonResponse
    {
        return fractal(CustomerData::createFromModel($customer), new CustomerFullDataTransformer())->respond();
    }
}
