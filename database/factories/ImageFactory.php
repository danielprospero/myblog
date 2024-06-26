<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'extension' => 'jpg',
            'path' => 'public/images/' . $this->faker->word() . '.' . 'jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Post',
        ];
    }
}
