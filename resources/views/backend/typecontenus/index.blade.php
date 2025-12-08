@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Types de Contenu</h3>
        <a href="{{ route('backend.typecontenus.create') }}" class="btn btn-primary float-end">Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="typecontenusTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($typecontenus as $typecontenu)
                <tr>
                    <td>{{ $typecontenu->nom_contenu }}</td>
                    <td>
                        <a href="{{ route('backend.typecontenus.show', $typecontenu->id_type_contenu) }}" class="btn btn-info btn-sm">Afficher</a>
                        <a href="{{ route('backend.typecontenus.edit', $typecontenu->id_type_contenu) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('backend.typecontenus.destroy', $typecontenu->id_type_contenu) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#typecontenusTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthChange: true,
        pageLength: 10,
        language: {
            search: "Rechercher :",
            lengthMenu: "Afficher _MENU_ éléments",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            paginate: { first: "Premier", last: "Dernier", next: "Suivant", previous: "Précédent" }
        }
    });
});
</script>
@endsection
