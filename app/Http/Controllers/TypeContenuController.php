<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeContenu;

class TypeContenuController extends Controller
{
    public function index() {
        $typecontenus = TypeContenu::all();
        return view('backend.typecontenus.index', compact('typecontenus'));
    }

    public function create() {
        return view('backend.typecontenus.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_contenu' => 'required|string|max:255',
        ]);

        TypeContenu::create($request->only('nom_contenu'));

        return redirect()->route('backend.typecontenus.index')->with('success', 'Type de contenu ajouté avec succès.');
    }

    public function show($id) {
        $typecontenu = TypeContenu::findOrFail($id);
        return view('backend.typecontenus.show', compact('typecontenu'));
    }

    public function edit($id) {
        $typecontenu = TypeContenu::findOrFail($id);
        return view('backend.typecontenus.edit', compact('typecontenu'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom_contenu' => 'required|string|max:255',
        ]);

        $typecontenu = TypeContenu::findOrFail($id);
        $typecontenu->update($request->only('nom_contenu'));

        return redirect()->route('backend.typecontenus.index')->with('success', 'Type de contenu mis à jour.');
    }

    public function destroy($id) {
        $typecontenu = TypeContenu::findOrFail($id);
        $typecontenu->delete();
        return redirect()->route('backend.typecontenus.index')->with('success', 'Type de contenu supprimé.');
    }
}
