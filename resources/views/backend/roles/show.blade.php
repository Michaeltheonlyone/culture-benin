@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Rôle</h3>
        <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $role->id }}</td></tr>
            <tr><th>Nom</th><td>{{ $role->name }}</td></tr>
        </table>
    </div>
</div>
@endsection
