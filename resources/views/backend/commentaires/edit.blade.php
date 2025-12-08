@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Commentaire</h3>
        <a href="{{ route('backend.commentaires.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('backend.commentaires.update', $commentaire->id_commentaire) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="texte">Texte</label>
                <textarea name="texte" id="texte" class="form-control" required>{{ old('texte', $commentaire->texte) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="note">Note</label>
                <input type="number" name="note" id="note" class="form-control" min="0" max="10" value="{{ old('note', $commentaire->note) }}">
            </div>
            <div class="mb-3">
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" class="form-control" required value="{{ old('date', date('Y-m-d\TH:i', strtotime($commentaire->date))) }}">
            </div>
            <div class="mb-3">
                <label for="id_utilisateur">Utilisateur</label>
                <select name="id_utilisateur" id="id_utilisateur" class="form-control" required>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ $u->id == $commentaire->id_utilisateur ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_contenu">Contenu</label>
                <select name="id_contenu" id="id_contenu" class="form-control" required>
                    @foreach($contenus as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $commentaire->id_contenu ? 'selected' : '' }}>{{ $c->titre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('backend.commentaires.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
