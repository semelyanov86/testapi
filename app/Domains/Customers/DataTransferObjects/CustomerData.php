<?php


namespace Domains\Customers\DataTransferObjects;


use Domains\Customers\Enums\GenderEnum;
use Domains\Customers\Models\Customer;
use Illuminate\Support\Carbon;
use Parents\ValueObjects\PhoneNumberValueObject;

final class CustomerData extends \Parents\DataTransferObjects\ObjectData
{
    public ?int $id;

    public string $first_name;

    public string $last_name;

    public string $email;

    public string $country;

    public string $city;

    public string $username;

    public GenderEnum $gender;

    public PhoneNumberValueObject $phone;

    public ?Carbon $created_at;

    public ?Carbon $updated_at;

    public static function createFromImportArray(array $data): self
    {
        return new self([
            'first_name' => $data['name']['first'],
            'last_name' => $data['name']['last'],
            'email' => $data['email'],
            'country' => $data['location']['country'],
            'city' => $data['location']['city'],
            'username' => $data['login']['username'],
            'gender' => GenderEnum::fromValue($data['gender']),
            'phone' => PhoneNumberValueObject::make($data['phone'], $data['nat'])
        ]);
    }

    public static function createFromModel(Customer $customer): self
    {
        return new self([
            'id' => $customer->id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'email' => $customer->email,
            'country' => $customer->country,
            'city' => $customer->city,
            'username' => $customer->username,
            'gender' => GenderEnum::fromKey(strtoupper($customer->gender)),
            'phone' => PhoneNumberValueObject::make($customer->phone, config('services.external-api.nat')),
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at
        ]);
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
