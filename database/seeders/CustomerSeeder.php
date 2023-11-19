<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\PhoneNumber;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 customers with related phone numbers
        Customer::factory()
            ->count(20) // Number of customers to create
            ->has(PhoneNumber::factory()->count(3), 'phoneNumbers') // Each customer has 3 phone numbers
            ->create();
    }
}
