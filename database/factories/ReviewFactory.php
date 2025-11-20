<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class ReviewFactory extends Factory
{
    public function definition()
    {
        return [
            'book_id' => Book::inRandomOrder()->first()->id,
            'reviewer_name' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5),
            'review_text' => $this->faker->sentence(15),
        ];
    }
}
