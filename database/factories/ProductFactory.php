<?php

namespace Database\Factories;
use App\Models\Confectionery;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'confectioneries_id' => Confectionery::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'value' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
