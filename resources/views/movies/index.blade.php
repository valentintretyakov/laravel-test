@extends('layouts.app', ['title' => 'Movies'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Movies'])
            <a href="{{ route('movies.create') }}" class="btn btn-primary">Add</a>
        @endcomponent

        <div class="d-flex flex-column gap-3">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Genres</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->created_at }}</td>
                                <td>@if($movie->is_published == \App\Models\Movie::IS_PUBLISHED) <span class="badge bg-success">Published</span> @else <span class="badge bg-danger">Not Published</span> @endif</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        @foreach($movie->genres as $genre)
                                            <div class="badge bg-success">{{ $genre->name }}</div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1 align-items center">
                                        @if($movie->is_published == \App\Models\Movie::IS_PUBLISHED)
                                            <a class="btn btn-secondary" href="{{ route('movies.unpublish', $movie->id) }}">Unpublish</a>
                                        @else
                                            <a class="btn btn-secondary" href="{{ route('movies.publish', $movie->id) }}">Publish</a>
                                        @endif
                                        <a class="btn btn-secondary" href="{{ route('movies.show', $movie->id) }}">Show</a>
                                        <a class="btn btn-success" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                                        {{ Form::open(['route' => ['movies.destroy', $movie->id]]) }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $movies->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
