@extends('layouts.app', ['title' => 'Edit movie'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Edit movie'])
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Back</a>
        @endcomponent

        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['movies.update', $movie], 'method' => 'PUT', 'files' => true]) }}
                <div class="d-flex flex-column gap-3">
                    @include('movies.form')

                    <div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
