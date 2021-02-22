<?php

namespace Domains\Customers\Commands;

use Domains\Customers\Actions\ImportCustomersAction;
use Parents\Commands\ConsoleCommand as Command;

final class ImportCustomerDataCommand extends Command
{
    protected $signature = 'customers:import';

    protected $description = 'Import customers from API';

    public function handle(ImportCustomersAction $action)
    {
        $action();
    }
}
