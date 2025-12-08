@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier la Région</h3>
        <a href="{{ route('backend.region.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.region.update', $region->id_region) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom_region">Nom</label>
                <input type="text" name="nom_region" class="form-control" value="{{ $region->nom_region }}" required>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $region->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="population">Population</label>
                <input type="number" name="population" class="form-control" value="{{ $region->population }}">
            </div>
            <div class="mb-3">
                <label for="superficie">Superficie</label>
                <input type="number" step="0.01" name="superficie" class="form-control" value="{{ $region->superficie }}">
            </div>
            <div class="mb-3">
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" class="form-control" value="{{ $region->localisation }}">
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.region.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
