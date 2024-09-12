<div class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter name" value="{{ isset($movie->name) ? $movie->name : '' }}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <label for="genres" class="form-label">Genres</label>
        {!! Form::select('genres[]', $genres, isset($selectedGenres) ? $selectedGenres : null, ['class' => $errors->has('genres') ? 'is-invalid form-control' : 'form-control', 'multiple', 'id' => 'genres']) !!}
        @if($errors->has('genres'))
            <div class="invalid-feedback">
                {{ $errors->first('genres') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <label for="poster" class="form-label">Poster</label>
        {!! Form::file('poster', ['class' => $errors->has('poster') ? 'is-invalid form-control' : 'form-control', 'id' => 'poster']) !!}
        @if($errors->has('poster'))
            <div class="invalid-feedback">
                {{ $errors->first('poster') }}
            </div>
        @endif

        @if(isset($movie->poster) && $movie->poster)
            <img class="img-fluid mt-3" style="max-width: 400px;" src="{{ Storage::url($movie->poster) }}" alt="">
        @endif
    </div>
</div>
