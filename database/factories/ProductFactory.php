<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all();

        return [
            'item_name' => $this->faker->catchPhrase(),
            'price' => rand(1,515),
            'slug' => Str::slug($this->faker->catchPhrase()),
            'user_id' => 1,
            'item_code' => $this->faker->numberBetween($min = 1, $max = 4523523),
            'img_01' => fake()->image('public/storage',640,480, null, false),
            'published' => (bool)rand(0, 1),
            'purchasable' => (bool)rand(0, 1),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 45),
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
