<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMedia;

class TypeMediaController extends Controller
{
    public function index() {
        $typemedias = TypeMedia::all();
        return view('backend.typemedias.index', compact('typemedias'));
    }

    public function create() {
        return view('backend.typemedias.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_media' => 'required|string|max:255',
        ]);

        TypeMedia::create($request->only('nom_media'));

        return redirect()->route('backend.typemedias.index')->with('success', 'TypeMedia ajouté avec succès.');
    }

    public function show($id) {
        $typemedia = TypeMedia::findOrFail($id);
        return view('backend.typemedias.show', compact('typemedia'));
    }

    public function edit($id) {
        $typemedia = TypeMedia::findOrFail($id);
        return view('backend.typemedias.edit', compact('typemedia'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom_media' => 'required|string|max:255',
        ]);

        $typemedia = TypeMedia::findOrFail($id);
        $typemedia->update($request->only('nom_media'));

        return redirect()->route('backend.typemedias.index')->with('success', 'TypeMedia mis à jour.');
    }

    public function destroy($id) {
        $typemedia = TypeMedia::findOrFail($id);
        $typemedia->delete();

        return redirect()->route('backend.typemedias.index')->with('success', 'TypeMedia supprimé.');
    }
}
