
@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Contenu</h3>
        <a href="{{ route('backend.contenus.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        {{-- enctype requis pour upload de fichiers --}}
        <form action="{{ route('backend.contenus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" required>
            </div>
            <div class="mb-3">
                <label>Contenu</label>
                <textarea name="contenu" class="form-control" required>{{ old('contenu') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Type Contenu</label>
                <select name="id_type_contenu" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($types as $t)
                        <option value="{{ $t->{$t->getKeyName()} }}">{{ $t->nom_contenu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Type Média</label>
                <select name="id_type_media" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($medias as $m)
                        <option value="{{ $m->{$m->getKeyName()} }}">{{ $m->nom_media }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Région</label>
                <select name="id_region" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($regions as $r)
                        <option value="{{ $r->{$r->getKeyName()} }}">{{ $r->nom_region }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Images / Médias</label>
                <input type="file" name="medias[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">Vous pouvez uploader plusieurs fichiers. Ils seront liés au contenu.</small>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.contenus.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
// ...existing code...