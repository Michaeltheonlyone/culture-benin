<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\User;
use App\Models\Contenu;

class CommentairesController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur', 'contenu'])->get();
        return view('backend.commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $users = User::all();
        $contenus = Contenu::all();
        return view('backend.commentaires.create', compact('users', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:0|max:10',
            'date' => 'required|date',
            'id_utilisateur' => 'required|exists:users,id',
            'id_contenu' => 'required|exists:contenus,id',
        ]);

        Commentaire::create($request->all());

        return redirect()->route('backend.commentaires.index')->with('success', 'Commentaire ajouté avec succès.');
    }

    public function show($id)
    {
        $commentaire = Commentaire::with(['utilisateur', 'contenu'])->findOrFail($id);
        return view('backend.commentaires.show', compact('commentaire'));
    }

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $users = User::all();
        $contenus = Contenu::all();
        return view('backend.commentaires.edit', compact('commentaire', 'users', 'contenus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:0|max:10',
            'date' => 'required|date',
            'id_utilisateur' => 'required|exists:users,id',
            'id_contenu' => 'required|exists:contenus,id',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($request->all());

        return redirect()->route('backend.commentaires.index')->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('backend.commentaires.index')->with('success', 'Commentaire supprimé avec succès.');
    }

    public function storeFront(Request $request)
{
    $request->validate([
        'texte' => 'required|string',
        'note' => 'nullable|integer|min:1|max:5',
        'id_contenu' => 'required|exists:contenus,id',
    ]);

    Commentaire::create([
        'texte' => $request->texte,
        'note' => $request->note,
        'date' => now(),
        'id_utilisateur' => auth()->id(), // logged-in user
        'id_contenu' => $request->id_contenu,
    ]);

    return redirect()->route('contenus.show', $request->id_contenu)
                     ->with('success', 'Commentaire ajouté.');
}
}
