<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PhoneNumber>
 */
class PhoneNumberFactory extends Factory
{
    protected $model = PhoneNumber::class;

    public function definition(): array
    {
        return [
            // Assuming you have a 'customer_id' field to relate to the Customer
            'customer_id' => Customer::factory(),
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
