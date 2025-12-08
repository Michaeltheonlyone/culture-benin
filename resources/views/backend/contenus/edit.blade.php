
@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Contenu</h3>
        <a href="{{ route('backend.contenus.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('backend.contenus.update', $contenu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre', $contenu->titre) }}" required>
            </div>
            <div class="mb-3">
                <label>Contenu</label>
                <textarea name="contenu" class="form-control" required>{{ old('contenu', $contenu->contenu) }}</textarea>
            </div>
            <div class="mb-3">
                <label>Type Contenu</label>
                <select name="id_type_contenu" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($types as $t)
                        <option value="{{ $t->{$t->getKeyName()} }}" {{ $contenu->id_type_contenu == $t->{$t->getKeyName()} ? 'selected' : '' }}>{{ $t->nom_contenu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Type Média</label>
                <select name="id_type_media" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($medias as $m)
                        <option value="{{ $m->{$m->getKeyName()} }}" {{ $contenu->id_type_media == $m->{$m->getKeyName()} ? 'selected' : '' }}>{{ $m->nom_media }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Région</label>
                <select name="id_region" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($regions as $r)
                        <option value="{{ $r->{$r->getKeyName()} }}" {{ $contenu->id_region == $r->{$r->getKeyName()} ? 'selected' : '' }}>{{ $r->nom_region }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Images / Médias (ajout)</label>
                <input type="file" name="medias[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">Uploader pour ajouter de nouveaux médias au contenu.</small>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.contenus.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
// ...existing code...