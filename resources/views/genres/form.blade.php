<div class="row">
    <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter name" value="{{ isset($genre->name) ? $genre->name : '' }}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
</div>
