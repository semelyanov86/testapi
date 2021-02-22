<?php


namespace Domains\Customers\Tests\Feature;


use Domains\Customers\DataTransferObjects\CustomerData;
use Domains\Customers\Models\Customer;

class ApiResponsesTest extends \Parents\Tests\PhpUnit\TestCase
{
    /**
     * @test
     */
    public function it_returns_all_customers_as_a_collection_of_resource_objects(): void
    {
        $fakeCustomers = Customer::factory()->count(10)->make();
        Customer::insert($fakeCustomers->toArray());
        $this->get('api/v1/customers')->assertStatus(200)->assertJson([
            'data' => array()
        ]);
    }

    /**
     * @test
     */
    public function it_returns_a_customer_as_a_resource_object(): void
    {
        $customer = Customer::factory()->createOne();
        $this->get('api/v1/customers/' . $customer->id)->assertStatus(200)->assertJson([
            'data' => array(
                'id' => $customer->id,
                'full_name' => $customer->full_name,
                'email' => $customer->email,
                'country' => $customer->country,
                'username' => $customer->username,
                'gender' => $customer->gender->description,
                'city' => $customer->city,
            )
        ]);
    }
}
