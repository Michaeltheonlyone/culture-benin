@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Utilisateurs</h3>
        <a href="{{ route('backend.users.create') }}" class="btn btn-primary float-end">Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="usersTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Langue</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? '-' }}</td>
                    <td>{{ $user->langue->nom_langue ?? '-' }}</td>
                    <td class="text-center" style="white-space:nowrap">
                        <a href="{{ route('backend.users.show', $user->id) }}"
                           class="btn btn-primary btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Afficher">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('backend.users.edit', $user->id) }}"
                           class="btn btn-warning btn-sm text-white"
                           style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;margin-right:6px;"
                           title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('backend.users.destroy', $user->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm text-white"
                                    style="width:36px;height:32px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:6px;"
                                    onclick="return confirm('Supprimer cet utilisateur ?')"
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
    $('#usersTable').DataTable({
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