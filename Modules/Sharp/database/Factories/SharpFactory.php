<?php

namespace Modules\Sharp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SharpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Sharp\app\Models\Sharp::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "content" => fake()->paragraph(),
            "user_id" => 1,
        ];
    }
}

