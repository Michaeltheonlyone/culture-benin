@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Media</h3>
        <a href="{{ route('backend.medias.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('backend.medias.update', $media->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titre_media">Titre Media</label>
                <input type="text" name="titre_media" class="form-control" id="titre_media" value="{{ old('titre_media', $media->titre_media) }}" required>
            </div>
            <div class="mb-3">
                <label for="url">URL</label>
                <input type="text" name="url" class="form-control" id="url" value="{{ old('url', $media->url) }}" required>
            </div>
            <div class="mb-3">
                <label for="id_type_media">Type Media (ID)</label>
                <input type="number" name="id_type_media" class="form-control" id="id_type_media" value="{{ old('id_type_media', $media->id_type_media) }}" required>
            </div>
            <div class="mb-3">
                <label for="id_contenu">Contenu (ID)</label>
                <input type="number" name="id_contenu" class="form-control" id="id_contenu" value="{{ old('id_contenu', $media->id_contenu) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('backend.medias.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
