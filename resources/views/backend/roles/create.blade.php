@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Rôle</h3>
        <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.roles.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
