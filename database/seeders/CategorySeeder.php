<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi', 'description' => 'Buku tentang pemrograman dan teknologi informasi'],
            ['name' => 'Fiksi', 'description' => 'Novel dan cerita fiksi'],
            ['name' => 'Sains', 'description' => 'Buku ilmu pengetahuan alam dan sains populer'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}