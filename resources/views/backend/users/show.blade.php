@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails de l'utilisateur</h3>
        <a href="{{ route('backend.users.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $user->id }}</td></tr>
            <tr><th>Nom</th><td>{{ $user->nom }}</td></tr>
            <tr><th>Prénom</th><td>{{ $user->prenom }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            <tr><th>Sexe</th><td>{{ $user->sexe ?? '-' }}</td></tr>
            <tr><th>Date de naissance</th><td>{{ $user->date_naissance ?? '-' }}</td></tr>
            <tr><th>Rôle</th><td>{{ $user->role->name ?? '-' }}</td></tr>
            <tr><th>Langue</th><td>{{ $user->langue->nom_langue ?? '-' }}</td></tr>
            <tr><th>Date inscription</th><td>{{ $user->date_inscription }}</td></tr>
            <tr><th>Statut</th><td>{{ $user->statut }}</td></tr>
        </table>
    </div>
</div>
@endsection
