<?php

namespace Modules\Finance\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Finance\Models\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->sentence(),
            'address' => fake()->address(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

