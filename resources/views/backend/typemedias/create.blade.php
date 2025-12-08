@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Type de Media</h3>
        <a href="{{ route('backend.typemedias.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('backend.typemedias.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nom_media">Nom Media</label>
                <input type="text" name="nom_media" class="form-control" id="nom_media" value="{{ old('nom_media') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.typemedias.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
