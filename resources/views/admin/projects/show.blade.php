@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-light">Dettagli del Progetto</h1>
    <div class="card">
        <div class="card-header">
            {{ $project->title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Slug: {{ $project->slug }}</h5>
            <p class="card-text">Creato il: {{ $project->created_at }}</p>
            <p class="card-text">Aggiornato il: {{ $project->updated_at }}</p>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna indietro</a>
        </div>
    </div>
</div>
@endsection