@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Commentaires</h3>
        <a href="{{ route('backend.commentaires.create') }}" class="btn btn-primary float-end">Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="commentairesTable">
            <thead>
                <tr>
                    <th>Texte</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Utilisateur</th>
                    <th>Contenu</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commentaires as $c)
                <tr>
                    <td style="max-width:420px;white-space:normal;">{{ Str::limit($c->texte, 180) }}</td>
                    <td>{{ $c->note }}</td>
                    <td>
    @php
        $date = $c->date ?? $c->created_at;
    @endphp
    @if($date)
        {{ is_string($date) ? \Carbon\Carbon::parse($date)->format('d/m/Y') : $date->format('d/m/Y') }}
    @else
        -
    @endif
</td>
                    <td>{{ optional($c->utilisateur)->prenom ?? optional($c->user)->name ?? '-' }}</td>
                    <td>{{ optional($c->contenu)->titre ?? '-' }}</td>
                    <td class="text-center" style="white-space:nowrap">
                        <a href="{{ route('backend.commentaires.show', $c->id_commentaire) }}"
                           class="btn btn-info btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Afficher">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('backend.commentaires.edit', $c->id_commentaire) }}"
                           class="btn btn-warning btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('backend.commentaires.destroy', $c->id_commentaire ) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm text-white" type="submit"
                                    style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;"
                                    onclick="return confirm('Supprimer ce commentaire ?')"
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
    $('#commentairesTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 10,
        columnDefs: [
          { orderable: false, targets: -1 } // disable ordering on Action column
        ],
        language: {
            search: "Rechercher :",
            lengthMenu: "Afficher _MENU_ éléments",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            paginate: { first:"Premier", last:"Dernier", next:"Suivant", previous:"Précédent" }
        }
    });
});
</script>
@endsection