<?php


namespace Domains\Customers\Tasks;


use Domains\Customers\DataTransferObjects\CustomerData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class GetCustomersFromApiTask extends \Parents\Tasks\Task
{
    public function run(): Collection
    {
        $result = Http::get(config('services.external-api.url'), [
            'nat' => config('services.external-api.nat'),
            'results' => config('services.external-api.max')
        ])->throw()->json();
        return $this->responseToDto($result);
    }

    public function responseToDto(array $response): Collection
    {
        return collect($response['results'])->map(function(array $row): CustomerData {
            return CustomerData::createFromImportArray($row);
        });
    }
}
