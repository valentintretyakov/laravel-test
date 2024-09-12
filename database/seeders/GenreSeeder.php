<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Action', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comedy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fantasy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Horror', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Science Fiction', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thriller', 'created_at' => now(), 'updated_at' => now()]
        ];

        Genre::insert($genres);
    }
}
