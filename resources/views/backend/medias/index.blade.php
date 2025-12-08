
@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Médias</h3>
        <a href="{{ route('backend.medias.create') }}" class="btn btn-primary float-end">Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="mediasTable">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type Média</th>
                    <th>URL</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medias as $media)
                <tr>
                    <td>{{ $media->titre_media ?? '-' }}</td>
                    <td>{{ $media->typeMedia->nom_media ?? '-' }}</td>
                    <td style="max-width:320px;overflow:hidden;text-overflow:ellipsis;">{{ $media->url }}</td>
                    <td class="text-center" style="white-space:nowrap">
                        <a href="{{ route('backend.medias.show', $media->getKey()) }}"
                           class="btn btn-primary btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Afficher">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('backend.medias.edit', $media->getKey()) }}"
                           class="btn btn-warning btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('backend.medias.destroy', $media->getKey()) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm text-white"
                                    style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;"
                                    onclick="return confirm('Supprimer ce média ?')"
                                    title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
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
    $('#mediasTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 10,
        columnDefs: [{ orderable: false, targets: -1 }],
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