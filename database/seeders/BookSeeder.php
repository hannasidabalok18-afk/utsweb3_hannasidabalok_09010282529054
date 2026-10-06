<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $teknologi = Category::where('name', 'Teknologi')->first();
        $fiksi = Category::where('name', 'Fiksi')->first();
        $sains = Category::where('name', 'Sains')->first();

        $books = [
            ['category_id' => $teknologi->id, 'title' => 'Belajar Laravel untuk Pemula', 'author' => 'Budi Santoso', 'publisher' => 'Informatika', 'year' => 2023, 'stock' => 10],
            ['category_id' => $teknologi->id, 'title' => 'Dasar-Dasar Basis Data', 'author' => 'Siti Aminah', 'publisher' => 'Andi Publisher', 'year' => 2021, 'stock' => 7],
            ['category_id' => $fiksi->id, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'year' => 2005, 'stock' => 5],
            ['category_id' => $fiksi->id, 'title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'publisher' => 'Lentera Dipantara', 'year' => 1980, 'stock' => 4],
            ['category_id' => $sains->id, 'title' => 'Sejarah Singkat Waktu', 'author' => 'Stephen Hawking', 'publisher' => 'Gramedia', 'year' => 2018, 'stock' => 6],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(['title' => $book['title']], $book);
        }
    }
}