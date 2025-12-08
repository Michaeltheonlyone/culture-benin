@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Commentaire</h3>
        <a href="{{ route('backend.commentaires.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $commentaire->id_commentaire }}</td></tr>
            <tr><th>Texte</th><td>{{ $commentaire->texte }}</td></tr>
            <tr><th>Note</th><td>{{ $commentaire->note }}</td></tr>
            <tr><th>Date</th><td>{{ $commentaire->date }}</td></tr>
            <tr><th>Utilisateur</th><td>{{ $commentaire->utilisateur->prenom ?? '' }} {{ $commentaire->utilisateur->nom ?? '-' }}</td></tr>
            <tr><th>Contenu</th><td>{{ $commentaire->contenu->titre ?? '-' }}</td></tr>
        </table>
    </div>
</div>
@endsection