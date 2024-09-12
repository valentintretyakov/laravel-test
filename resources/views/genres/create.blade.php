@extends('layouts.app', ['title' => 'Add genre'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Add genre'])
            <a href="{{ route('genres.index') }}" class="btn btn-primary">Back</a>
        @endcomponent

        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['genres.store']]) }}
                <div class="d-flex flex-column gap-3">
                    @include('genres.form')

                    <div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
