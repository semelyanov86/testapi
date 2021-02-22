<?php

namespace Domains\Customers\Factories;

use Domains\Customers\Enums\GenderEnum;
use Domains\Customers\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Parents\ValueObjects\PhoneNumberValueObject;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'country' => 'Australia',
            'city' => $this->faker->city,
            'username' => $this->faker->userName,
            'gender' => GenderEnum::getRandomInstance(),
            'phone' => PhoneNumberValueObject::make($this->faker->phoneNumber, 'AU')
        ];
    }
}
