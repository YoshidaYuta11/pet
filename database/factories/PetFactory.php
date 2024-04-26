<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(10),
            'kakaku' => $this->faker->numberBetween($min = 50, $max = 999),
            'shurui' => $this->faker->numberBetween($min = 1, $max = 3),
            'manufacturer' => $this->faker->numberBetween($min = 1, $max = 7),
            'shosai' => $this->faker->realText(50),
            'image' => 'public/images/' . $this->faker->image('public/storage/images', 400, 300, null, false),
            'created_at' => now(),
            'updated_at' => null,
        ];
    }
}
