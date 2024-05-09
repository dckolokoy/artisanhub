<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SideBackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_item_id' => rand(1, 5),
            'side_or_back' => rand(50, 700),
            'image' => $this->faker->url(),
        ];
    }
}
