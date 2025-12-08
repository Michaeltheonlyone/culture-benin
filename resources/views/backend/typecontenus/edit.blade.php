@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Type de Contenu</h3>
        <a href="{{ route('backend.typecontenus.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.typecontenus.update', $typecontenu->id_type_contenu) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom_contenu">Nom du Contenu</label>
                <input type="text" name="nom_contenu" class="form-control" value="{{ $typecontenu->nom_contenu }}" required>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.typecontenus.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
