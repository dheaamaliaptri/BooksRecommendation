<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'A Study in Scarlet',
                'author' => 'Arthur Conan Doyle',
                'description' => 'Novel pertama yang memperkenalkan Sherlock Holmes dan Dr. Watson, mengisahkan misteri pembunuhan yang rumit dan penyelidikan detektif yang cerdas.',
                'cover_image' => 'A Study in Scarlet.jpg'
            ],
            [
                'title' => 'Anne of Green Gables',
                'author' => 'L.M. Montgomery',
                'description' => 'Kisah klasik tentang gadis yatim piatu Anne Shirley yang ceria, penuh imajinasi, dan petualangan di Avonlea, yang menghangatkan hati pembaca dari segala usia.',
                'cover_image' => 'Anne of Green Gables.jpg'
            ],
            [
                'title' => 'Miss Winter',
                'author' => 'Penulis Fiktif',
                'description' => 'Novel misteri romantis tentang Miss Winter, seorang wanita cerdas yang menghadapi rahasia gelap dan petualangan tak terduga dalam kehidupannya.',
                'cover_image' => 'Miss Winter.jpg'
            ],
            [
                'title' => 'Romeo and Juliet',
                'author' => 'William Shakespeare',
                'description' => 'Tragedi klasik tentang cinta terlarang antara Romeo dan Juliet yang harus menghadapi konflik keluarga, ambisi, dan takdir yang tragis.',
                'cover_image' => 'Romeo and Juliet.jpg'
            ],
            [
                'title' => 'The Adventures of Sherlock Holmes',
                'author' => 'Arthur Conan Doyle',
                'description' => 'Kumpulan cerita pendek tentang detektif terkenal Sherlock Holmes yang memecahkan berbagai kasus misterius dengan kecerdikan dan pengamatan tajamnya.',
                'cover_image' => 'The Adventures of Sherlock Holmes.jpg'
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Petualangan epik Bilbo Baggins, seorang hobbit yang terlibat dalam perjalanan berbahaya penuh makhluk fantastis dan harta karun tersembunyi di Middle-earth.',
                'cover_image' => 'The Hobbit.jpg'
            ],
            [
                'title' => 'Two Truths',
                'author' => 'Penulis Fiktif',
                'description' => 'Novel psikologis yang menegangkan tentang dua kebenaran yang saling bertentangan, menghadirkan misteri dan intrik dalam kehidupan karakter-karakternya.',
                'cover_image' => 'Two Truths.jpg'
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
