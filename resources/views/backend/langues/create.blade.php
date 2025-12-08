@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter une Langue</h3>
        <a href="{{ route('backend.langues.index') }}" class="btn btn-secondary float-end">Retour</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('backend.langues.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>Code Langue</label>
                <input type="text" name="code_langue" class="form-control" value="{{ old('code_langue') }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Nom Langue</label>
                <input type="text" name="nom_langue" class="form-control" value="{{ old('nom_langue') }}" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('backend.langues.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
