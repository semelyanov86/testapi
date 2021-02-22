<?php


namespace Domains\Customers\Tests\Feature;
use Domains\Customers\DataTransferObjects\CustomerData;
use Domains\Customers\Models\Customer;
use Domains\Customers\Tasks\CreateCustomersFromCollectionTask;
use Domains\Customers\Tasks\GetCustomersFromApiTask;
use Illuminate\Support\Facades\Http;

class ImportCustomersTest extends \Parents\Tests\PhpUnit\TestCase
{
    /**
     * @test
     */
    public function it_should_import_contacts_from_api_to_collection_of_customer_data(): void
    {
        Http::fake([
            'https://*' => Http::sequence()
                ->push(array('results' => json_decode(file_get_contents('tests/fixtures/contacts.json'))), 200)
        ]);
        $testTest = new GetCustomersFromApiTask();
        $result = $testTest->run();
        $this->assertIsIterable($result);
        $this->assertCount(config('services.external-api.max'), $result);
        $this->assertInstanceOf(CustomerData::class, $result->first());
    }

    /**
     * @test
     */
    public function it_should_save_customer_data_to_database(): void
    {
        $fakeCustomers = Customer::factory()->count(10)->make();
        $tableName = $fakeCustomers->first()->table;
        $customersDtoCollection = $fakeCustomers->map(function(Customer $customer) {
            return CustomerData::createFromModel($customer);
        });
        $customerTaskInstance = new CreateCustomersFromCollectionTask();
        $savedCustomers = $customerTaskInstance->run($customersDtoCollection);
        $this->assertDatabaseCount($tableName, 10);
        $savedCustomers->each(function(Customer $customer) use ($tableName) {
           $this->assertDatabaseHas($tableName, $customer->toArray());
        });
    }

    /**
     * @test
     */
    public function it_updates_customer_with_the_same_email(): void
    {
        $customer = Customer::factory()->createOne();
        $tableName = $customer->table;
        $customer->save();
        $customer->first_name = 'changed-test';
        $customerDto = CustomerData::createFromModel($customer);
        $customerTaskInstance = new CreateCustomersFromCollectionTask();
        $customerTaskInstance->run(collect([$customerDto]));
        $this->assertDatabaseHas($tableName, $customer->toArray());
    }
}
