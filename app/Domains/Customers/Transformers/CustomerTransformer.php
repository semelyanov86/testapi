<?php


namespace Domains\Customers\Transformers;


use Domains\Customers\DataTransferObjects\CustomerData;

class CustomerTransformer extends \Parents\Transformers\Transformer
{
    public function transform(CustomerData $customerData): array
    {
        return array(
            'id' => $customerData->id,
            'full_name' => $customerData->getFullName(),
            'email' => $customerData->email,
            'country' => $customerData->country,
        );
    }
}
