@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Type de Contenu</h3>
        <a href="{{ route('backend.typecontenus.index') }}" class="btn btn-secondary float-end">Retour à la liste</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $typecontenu->id_type_contenu }}</td></tr>
            <tr><th>Nom</th><td>{{ $typecontenu->nom_contenu }}</td></tr>
        </table>
    </div>
</div>
@endsection
