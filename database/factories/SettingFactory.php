<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'about_first_text' => $this->faker->paragraph(),
            'about_second_text' => $this->faker->paragraph(),
            'about_first_image' => 'blog_template/images/about_img_1.jpg',
            'about_second_image' => 'blog_template/images/about_img_2.jpg',
            'about_our_vision' => $this->faker->paragraph(),
            'about_our_mission' => $this->faker->paragraph(),
            'about_services' => $this->faker->paragraph(),
        ];
    }
}
