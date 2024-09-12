@extends('layouts.app', ['title' => 'Show genre'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Show genre'])
            <a href="{{ route('genres.index') }}" class="btn btn-primary">Back</a>
        @endcomponent

        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-label">ID</div>
                        <input type="text" class="form-control" disabled value="{{ $genre->id }}">
                    </div>
                    <div class="col-12">
                        <div class="form-label">Name</div>
                        <input type="text" class="form-control" disabled value="{{ $genre->name }}">
                    </div>
                    <div class="col-12">
                        <div class="form-label">Created</div>
                        <input type="text" class="form-control" disabled value="{{ $genre->created_at }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
