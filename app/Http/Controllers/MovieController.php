<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate(5)->withQueryString();

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');

        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request, Movie $movie)
    {

        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $existingMovie = $request->route('movie');

            if ($existingMovie && $existingMovie->poster) {
                Storage::disk('public')->delete($existingMovie->poster);
            }

            $file = $request->file('poster');
            $path = $file->store('posters', 'public');
            $data['poster'] = $path;
        }

        $movie = Movie::create($data);

        $movie->genres()->attach($request->genres);

        return to_route('movies.index')->with(['status' => 'Successfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $genres = $movie->genres;

        return view('movies.show', compact('movie', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all()->pluck('name', 'id');
        $selectedGenres = $movie->genres->pluck('id')->toArray();

        return view('movies.edit', compact('movie', 'genres', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $existingMovie = $request->route('movie');

            if ($existingMovie && $existingMovie->poster) {
                Storage::disk('public')->delete($existingMovie->poster);
            }

            $file = $request->file('poster');
            $path = $file->store('posters', 'public');
            $data['poster'] = $path;
        }

        $movie->update($data);

        $movie->genres()->sync($request->get('genres'));

        return to_route('movies.index')->with(['status' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return to_route('movies.index')->with(['status' => 'Deleted Successfully']);
    }

    public function publish(Movie $movie)
    {
        $movie->is_published = Movie::IS_PUBLISHED;
        $movie->save();

        return to_route('movies.index')->with(['status' => 'Successfully published']);
    }

    public function unpublish(Movie $movie)
    {
        $movie->is_published = Movie::NOT_PUBLISHED;
        $movie->save();

        return to_route('movies.index')->with(['status' => 'Successfully unpublished']);
    }
}
