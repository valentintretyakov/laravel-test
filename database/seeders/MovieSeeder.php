<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moviesData = [
            [
                'name' => 'First movie',
                'is_published' => Movie::NOT_PUBLISHED,
                'genres' => [1, 3, 5],
            ],
            [
                'name' => 'Second movie',
                'is_published' => Movie::IS_PUBLISHED,
                'genres' => [2, 4],
            ],
        ];

        foreach ($moviesData as $movieData) {
            $movie = Movie::create([
                'name' => $movieData['name'],
                'is_published' => $movieData['is_published'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $movie->genres()->attach($movieData['genres']);
        }
    }
}
