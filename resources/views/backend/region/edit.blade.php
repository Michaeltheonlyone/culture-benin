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
            <div class="form-group mb-3">
                <label for="nom_region">Nom Région</label>
                <input type="text" name="nom_region" class="form-control" id="nom_region" value="{{ $region->nom_region }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="superficie">Superficie</label>
                <input type="number" name="superficie" class="form-control" id="superficie" value="{{ $region->superficie }}" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.region.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection