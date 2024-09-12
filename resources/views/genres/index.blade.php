@extends('layouts.app', ['title' => 'Genres'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Genres'])
            <a href="{{ route('genres.create') }}" class="btn btn-primary">Add</a>
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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($genres as $genre)
                            <tr>
                                <th scope="row">{{ $genre->id }}</th>
                                <td>{{ $genre->name }}</td>
                                <td>{{ $genre->created_at }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1 align-items center">
                                        <a class="btn btn-secondary" href="{{ route('genres.show', $genre->id) }}">Show</a>
                                        <a class="btn btn-success" href="{{ route('genres.edit', $genre->id) }}">Edit</a>
                                        {{ Form::open(['route' => ['genres.destroy', $genre->id]]) }}
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

            {{ $genres->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
