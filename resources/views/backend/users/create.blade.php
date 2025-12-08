@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Utilisateur</h3>
        <a href="{{ route('backend.users.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('backend.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>
            <div class="mb-3">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Sexe</label>
                <select name="sexe" class="form-control">
                    <option value="">--Sélectionner--</option>
                    <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>M</option>
                    <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Date de naissance</label>
                <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
            </div>
            <div class="mb-3">
                <label>Rôle</label>
                <select name="id_role" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('id_role') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Langue</label>
                <select name="id_langue" class="form-control">
                    <option value="">--Sélectionner--</option>
                    @foreach($langues as $lang)
                        <option value="{{ $lang->id_langue }}" {{ old('id_langue') == $lang->id_langue ? 'selected' : '' }}>
                            {{ $lang->nom_langue }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.users.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
