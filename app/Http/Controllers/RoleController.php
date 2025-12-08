<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create() {
        return view('backend.roles.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        Role::create($request->only('name'));
        return redirect()->route('backend.roles.index')->with('success','Rôle ajouté avec succès.');
    }

    public function show($id) {
        $role = Role::findOrFail($id);
        return view('backend.roles.show', compact('role'));
    }

    public function edit($id) {
        $role = Role::findOrFail($id);
        return view('backend.roles.edit', compact('role'));
    }

    public function update(Request $request, $id) {
        $request->validate(['name' => 'required|string|max:255']);
        $role = Role::findOrFail($id);
        $role->update($request->only('name'));
        return redirect()->route('backend.roles.index')->with('success','Rôle mis à jour avec succès.');
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('backend.roles.index')->with('success','Rôle supprimé avec succès.');
    }
}
