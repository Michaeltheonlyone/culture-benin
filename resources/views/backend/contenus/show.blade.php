
// ...existing code...
@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Contenu</h3>
        <a href="{{ route('backend.contenus.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $contenu->id }}</td></tr>
            <tr><th>Titre</th><td>{{ $contenu->titre }}</td></tr>
            <tr><th>Contenu</th><td>{!! nl2br(e($contenu->contenu)) !!}</td></tr>
            <tr><th>Type Contenu</th><td>{{ $contenu->typeContenu->nom_contenu ?? '-' }}</td></tr>
            <tr><th>Type Média</th><td>{{ $contenu->typeMedia->nom_media ?? '-' }}</td></tr>
            <tr><th>Région</th><td>{{ $contenu->region->nom_region ?? '-' }}</td></tr>
            <tr><th>Parent</th><td>{{ $contenu->parent->titre ?? '-' }}</td></tr>
        </table>

        <hr>

        <h5>Médias liés</h5>
        @if($contenu->medias->isEmpty())
            <p>Aucun média.</p>
        @else
            <div class="row">
                @foreach($contenu->medias as $m)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset($m->url) }}" class="card-img-top" alt="{{ $m->titre_media ?? '' }}">
                            <div class="card-body p-2">
                                <p class="mb-0 small">{{ $m->titre_media ?? '-' }}</p>
                                <form action="{{ route('backend.medias.destroy', $m->id ?? $m->getKey()) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger mt-2">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
// ...existing code...