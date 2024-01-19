<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = ['Science', 'Fiction', 'Programming', 'History', 'Health', 'Psychology', 'Physics'];
        return [
            'name' => fake()->name(),
            'dateofpublishing' => fake()->date(),
            'author' => fake()->name(),
            'tags' => $tags[rand(0, 6)],
            'price' => rand(20, 300)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
