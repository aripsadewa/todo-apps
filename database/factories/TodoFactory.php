<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'body' => $this->faker->paragraph(),
            'user_id' => $user->id,
        ];
    }
}
