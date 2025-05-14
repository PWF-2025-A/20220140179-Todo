<?php

namespace Database\Factories;


use App\Models\Category;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    protected $model = Todo::class; // Menentukan model yang digunakan
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Menghubungkan dengan factory User
            'title' => $this->faker->sentence, 
            'is_done' => $this->faker->boolean(), // true atau false
            'category_id' => Category::factory(), 
        ];
    }
}
