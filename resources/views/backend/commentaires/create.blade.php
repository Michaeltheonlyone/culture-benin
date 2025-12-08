@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Commentaire</h3>
        <a href="{{ route('backend.commentaires.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('backend.commentaires.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="texte">Texte</label>
                <textarea name="texte" id="texte" class="form-control" required>{{ old('texte') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="note">Note</label>
                <input type="number" name="note" id="note" class="form-control" min="0" max="10" value="{{ old('note') }}">
            </div>
            <div class="mb-3">
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" class="form-control" required value="{{ old('date') }}">
            </div>
            <div class="mb-3">
                <label for="id_utilisateur">Utilisateur</label>
                <select name="id_utilisateur" id="id_utilisateur" class="form-control" required>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_contenu">Contenu</label>
                <select name="id_contenu" id="id_contenu" class="form-control" required>
                    @foreach($contenus as $c)
                        <option value="{{ $c->id }}">{{ $c->titre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.commentaires.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
