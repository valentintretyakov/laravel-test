@extends('layouts.app', ['title' => 'Add movie'])

@section('content')
    <div class="container">
        @component('partials.page-title', ['title' => 'Add movie'])
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Back</a>
        @endcomponent

        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['movies.store'], 'files' => true]) }}
                <div class="d-flex flex-column gap-3">
                    @include('movies.form')

                    <div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
