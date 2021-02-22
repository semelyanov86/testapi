<?php


namespace Domains\Customers\Actions;


use Domains\Customers\Tasks\CreateCustomersFromCollectionTask;
use Domains\Customers\Tasks\GetCustomersFromApiTask;

final class ImportCustomersAction extends \Parents\Actions\Action
{
    public function __construct(
        protected GetCustomersFromApiTask $importTask,
        protected CreateCustomersFromCollectionTask $creationTask
    )
    {}

    public function __invoke(): void
    {
        try {
            $customers = $this->importTask->run();
            $this->creationTask->run($customers);
        } catch (\Exception $ex) {
            \Log::error('Error while importing contacts from API: ' . $ex->getMessage());
            echo $ex->getMessage();
        }
    }
}
