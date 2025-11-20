<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'book_id' => 1,
                'reviewer_name' => 'Alice',
                'rating' => 5,
                'review_text' => 'Buku yang sangat bagus!',
            ],
            [
                'book_id' => 1,
                'reviewer_name' => 'Bob',
                'rating' => 4,
                'review_text' => 'Ceritanya menarik!',
            ],
            [
                'book_id' => 2,
                'reviewer_name' => 'Charlie',
                'rating' => 5,
                'review_text' => 'Petualangan yang seru!',
            ],
            [
                'book_id' => 3,
                'reviewer_name' => 'Diana',
                'rating' => 3,
                'review_text' => 'Lumayan, tapi agak membosankan.',
            ],
            [
                'book_id' => 4,
                'reviewer_name' => 'Eve',
                'rating' => 4,
                'review_text' => 'Suka dengan gaya penulisannya!',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
