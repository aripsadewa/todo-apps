<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $todo = Todo::factory()->create();

        return [
            'imageable_id' => $todo->id,
            'imageable_type' => 'App\Models\Todo',
            'path' => $this->faker->imageUrl(1024, 800),
        ];
    }
}
