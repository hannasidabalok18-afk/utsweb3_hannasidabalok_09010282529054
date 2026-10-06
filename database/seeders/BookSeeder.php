<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori
        $fiksi     = Category::firstOrCreate(['name' => 'Fiksi'], ['description' => 'Buku novel dan cerita fiksi']);
        $teknologi = Category::firstOrCreate(['name' => 'Teknologi'], ['description' => 'Buku seputar pemrograman dan teknologi']);
        $sains     = Category::firstOrCreate(['name' => 'Sains'], ['description' => 'Buku ilmu pengetahuan alam dan sains populer']);
        $sejarah   = Category::firstOrCreate(['name' => 'Sejarah'], ['description' => 'Buku sejarah nasional dan dunia']);
        $selfDev   = Category::firstOrCreate(['name' => 'Pengembangan Diri'], ['description' => 'Buku psikologi dan motivasi']);
        $bisnis    = Category::firstOrCreate(['name' => 'Bisnis & Ekonomi'], ['description' => 'Buku seputar kewirausahaan dan keuangan']);

        // 2. Data Buku (6 Buku Bawaan Kamu + 13 Buku Baru)
        $books = [
            // --- DATA BUKU KAMU ---
            ['category_id' => $teknologi->id, 'title' => 'Belajar Laravel untuk Pemula', 'author' => 'Budi Santoso', 'publisher' => 'Informatika', 'year' => 2023, 'stock' => 10],
            ['category_id' => $teknologi->id, 'title' => 'Dasar-Dasar Basis Data', 'author' => 'Siti Aminah', 'publisher' => 'Andi Publisher', 'year' => 2021, 'stock' => 7],
            ['category_id' => $fiksi->id, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'year' => 2005, 'stock' => 5],
            ['category_id' => $fiksi->id, 'title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'publisher' => 'Lentera Dipantara', 'year' => 1980, 'stock' => 4],
            ['category_id' => $sains->id, 'title' => 'Sejarah Singkat Waktu', 'author' => 'Stephen Hawking', 'publisher' => 'Gramedia', 'year' => 2018, 'stock' => 6],

            // --- 13 TAMBAHAN BUKU BARU ---
            ['category_id' => $teknologi->id, 'title' => 'Belajar Python untuk Pemula', 'author' => 'Ahmad Dahlan', 'publisher' => 'Andi Offset', 'year' => 2022, 'stock' => 15],
            ['category_id' => $teknologi->id, 'title' => 'Clean Code Software Craftsmanship', 'author' => 'Robert C. Martin', 'publisher' => 'Prentice Hall', 'year' => 2019, 'stock' => 9],
            ['category_id' => $fiksi->id, 'title' => 'Cantik Itu Luka', 'author' => 'Eka Kurniawan', 'publisher' => 'Gramedia', 'year' => 2018, 'stock' => 12],
            ['category_id' => $fiksi->id, 'title' => 'Laut Bercerita', 'author' => 'Leila S. Chudori', 'publisher' => 'KPG', 'year' => 2017, 'stock' => 20],
            ['category_id' => $fiksi->id, 'title' => 'Hujan', 'author' => 'Tere Liye', 'publisher' => 'Republika', 'year' => 2016, 'stock' => 18],
            ['category_id' => $fiksi->id, 'title' => 'Gadis Kretek', 'author' => 'Ratih Kumala', 'publisher' => 'Gramedia', 'year' => 2012, 'stock' => 21],
            ['category_id' => $sains->id, 'title' => 'Sapiens: Riwayat Singkat Umat Manusia', 'author' => 'Yuval Noah Harari', 'publisher' => 'KPG', 'year' => 2020, 'stock' => 9],
            ['category_id' => $sains->id, 'title' => 'Cosmos', 'author' => 'Carl Sagan', 'publisher' => 'Gramedia', 'year' => 2019, 'stock' => 7],
            ['category_id' => $sejarah->id, 'title' => 'Sejarah Indonesia Modern 1200–2008', 'author' => 'M.C. Ricklefs', 'publisher' => 'Serambi', 'year' => 2013, 'stock' => 5],
            ['category_id' => $selfDev->id, 'title' => 'Atomic Habits', 'author' => 'James Clear', 'publisher' => 'Gramedia', 'year' => 2019, 'stock' => 25],
            ['category_id' => $selfDev->id, 'title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'publisher' => 'Kompas', 'year' => 2018, 'stock' => 30],
            ['category_id' => $bisnis->id, 'title' => 'Psychology of Money', 'author' => 'Morgan Housel', 'publisher' => 'Baca', 'year' => 2021, 'stock' => 28],
            ['category_id' => $bisnis->id, 'title' => 'Rich Dad Poor Dad', 'author' => 'Robert T. Kiyosaki', 'publisher' => 'Gramedia', 'year' => 2017, 'stock' => 24],
        ];

        // 3. Masukkan Data ke Database
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}