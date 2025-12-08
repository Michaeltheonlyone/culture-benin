@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Media</h3>
        <a href="{{ route('backend.medias.index') }}" class="btn btn-secondary float-end">Retour à la liste</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $media->id }}</td></tr>
            <tr><th>Titre Media</th><td>{{ $media->titre_media }}</td></tr>
            <tr><th>URL</th><td>{{ $media->url }}</td></tr>
            <tr><th>Type Media (ID)</th><td>{{ $media->id_type_media }}</td></tr>
            <tr><th>Contenu (ID)</th><td>{{ $media->id_contenu }}</td></tr>
        </table>
    </div>
</div>
@endsection
