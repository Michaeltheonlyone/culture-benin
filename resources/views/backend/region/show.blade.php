@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails de la Région</h3>
        <a href="{{ route('backend.region.index') }}" class="btn btn-secondary float-end">Retour à la liste</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $region->id_region }}</td></tr>
            <tr><th>Nom Région</th><td>{{ $region->nom_region }}</td></tr>
            <tr><th>Superficie</th><td>{{ $region->superficie }}</td></tr>
        </table>
    </div>
</div>
@endsection