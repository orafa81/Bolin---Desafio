<?php

namespace Database\Factories;

use App\Models\Confectionery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Confectionery>
 */
class ConfectioneryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Confectionery::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'cep' => $this->faker->postcode,
            'road' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'neighborhood' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'telephone' => $this->faker->phoneNumber,
            'latitude' => $this->faker->latitude(-33.750000, 5.271786),   
            'longitude' => $this->faker->longitude(-73.990448, -34.729996),
        ];
    }
}
