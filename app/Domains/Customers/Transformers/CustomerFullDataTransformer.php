<?php


namespace Domains\Customers\Transformers;


use Domains\Customers\DataTransferObjects\CustomerData;

final class CustomerFullDataTransformer extends CustomerTransformer
{
    public function transform(CustomerData $customerData): array
    {
        $mapping = parent::transform($customerData);
        $mapping['username'] = $customerData->username;
        $mapping['gender'] = $customerData->gender->description;
        $mapping['city'] = $customerData->city;
        $mapping['phone'] = $customerData->phone->getRawNumber();
        return $mapping;
    }
}
