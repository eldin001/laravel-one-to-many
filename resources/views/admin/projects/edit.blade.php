@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-light">Modifica Progetto</h1>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="text-light" for="title">Titolo del Progetto</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label class="text-light" for="slug">Slug del Progetto</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $project->slug }}" required>
        </div>
        <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage"
                    name="image" value="{{ old('image') }}" maxlength="255">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>
@endsection