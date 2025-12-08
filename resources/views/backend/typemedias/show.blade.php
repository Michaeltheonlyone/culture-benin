@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Type de Media</h3>
        <a href="{{ route('backend.typemedias.index') }}" class="btn btn-secondary float-end">Retour à la liste</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $typemedia->id_type_media }}</td>
            </tr>
            <tr>
                <th>Nom Media</th>
                <td>{{ $typemedia->nom_media }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
