@extends('layouts.app', ['title' => 'Show movie'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Show movie'])
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Back</a>
        @endcomponent

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-label">ID</div>
                        <input type="text" class="form-control" disabled value="{{ $movie->id }}">
                    </div>
                    <div class="col-12">
                        <div class="form-label">ID</div>
                        <input type="text" class="form-control" disabled value="{{ $movie->name }}">
                    </div>
                    <div class="col-12">
                        <div class="form-label">Publish</div>
                        <input type="text" class="form-control" disabled value="{{ $movie->is_published == \App\Models\Movie::IS_PUBLISHED ? 'Published' : 'Not Published' }}">
                    </div>
                    <div class="col-12">
                        <div class="form-label">Poster</div>
                        <img class="img-fluid" style="max-width: 400px;" src="{{ $movie->poster ? Storage::url($movie->poster) : asset('images/no_image.svg') }}" alt="">
                    </div>
                    @if($genres)
                        <div class="col-12">
                            <div class="form-label">Genres</div>
                            <div class="d-flex gap-1 align-items-center flex-wrap">
                                @foreach($genres as $genre)
                                    <span class="badge bg-success">{{ $genre->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
