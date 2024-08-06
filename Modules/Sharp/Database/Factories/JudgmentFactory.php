<?php

namespace Modules\Sharp\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JudgmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Sharp\app\Models\Judgment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "sharp_id" => rand(1,5),
            "judgment_id" => rand(0,1) == 1 ? 1 : null,
            "content" => fake()->sentence,
            "is_agree" => rand(0,1) == 1,
            "user_id" => 1
        ];
    }
}

