<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Langue;

class UsersController extends Controller
{
    public function index() {
        $users = User::with('role','langue')->get();
        return view('backend.users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        $langues = Langue::all();
        return view('backend.users.create', compact('roles','langues'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'sexe' => 'nullable|in:M,F',
            'date_naissance' => 'nullable|date',
            'id_role' => 'nullable|exists:roles,id',
            'id_langue' => 'nullable|exists:langues,id_langue',
        ]);

        $data = $request->only(['nom','prenom','email','password','sexe','date_naissance','id_role','id_langue']);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('backend.users.index')->with('success','Utilisateur ajouté avec succès.');
    }

    public function show($id) {
        $user = User::with('role','langue')->findOrFail($id);
        return view('backend.users.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $langues = Langue::all();
        return view('backend.users.edit', compact('user','roles','langues'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'sexe' => 'nullable|in:M,F',
            'date_naissance' => 'nullable|date',
            'id_role' => 'nullable|exists:roles,id',
            'id_langue' => 'nullable|exists:langues,id_langue',
        ]);

        $data = $request->only(['nom','prenom','email','sexe','date_naissance','id_role','id_langue']);
        if ($request->filled('password')) $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('backend.users.index')->with('success','Utilisateur mis à jour.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('backend.users.index')->with('success','Utilisateur supprimé.');
    }
}
