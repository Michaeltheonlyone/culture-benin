<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;

class LanguesController extends Controller
{
    public function index() {
        $langues = Langue::all();
        return view('backend.langues.index', compact('langues'));
    }

    public function create() {
        return view('backend.langues.create');
    }

    public function store(Request $request) {
        $request->validate([
            'code_langue' => 'required|string|max:10',
            'nom_langue'  => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Langue::create($request->only('code_langue', 'nom_langue', 'description'));

        return redirect()->route('backend.langues.index')->with('success', 'Langue ajoutée avec succès.');
    }

    public function show($id_langue) {
        $langue = Langue::findOrFail($id_langue);
        return view('backend.langues.show', compact('langue'));
    }

    public function edit($id_langue) {
        $langue = Langue::findOrFail($id_langue);
        return view('backend.langues.edit', compact('langue'));
    }

    public function update(Request $request, $id_langue) {
        $request->validate([
            'code_langue' => 'required|string|max:10',
            'nom_langue'  => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $langue = Langue::findOrFail($id_langue);
        $langue->update($request->only('code_langue', 'nom_langue', 'description'));

        return redirect()->route('backend.langues.index')->with('success', 'Langue mise à jour avec succès.');
    }

    public function destroy($id_langue) {
        $langue = Langue::findOrFail($id_langue);
        $langue->delete();

        return redirect()->route('backend.langues.index')->with('success', 'Langue supprimée avec succès.');
    }
}
