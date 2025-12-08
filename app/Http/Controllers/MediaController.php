<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function index() {
        $medias = Media::all();
        return view('backend.medias.index', compact('medias'));
    }

    public function create() {
        return view('backend.medias.create');
    }

    public function store(Request $request) {
        $request->validate([
            'url' => 'required|string|max:255',
            'titre_media' => 'required|string|max:255',
            'id_type_media' => 'required|integer',
            'id_contenu' => 'required|integer',
        ]);

        Media::create($request->only('url', 'titre_media', 'id_type_media', 'id_contenu'));

        return redirect()->route('backend.medias.index')->with('success', 'Media ajouté avec succès.');
    }

    public function show($id) {
        $media = Media::findOrFail($id);
        return view('backend.medias.show', compact('media'));
    }

    public function edit($id) {
        $media = Media::findOrFail($id);
        return view('backend.medias.edit', compact('media'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'url' => 'required|string|max:255',
            'titre_media' => 'required|string|max:255',
            'id_type_media' => 'required|integer',
            'id_contenu' => 'required|integer',
        ]);

        $media = Media::findOrFail($id);
        $media->update($request->only('url', 'titre_media', 'id_type_media', 'id_contenu'));

        return redirect()->route('backend.medias.index')->with('success', 'Media mis à jour avec succès.');
    }

    public function destroy($id) {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->route('backend.medias.index')->with('success', 'Media supprimé avec succès.');
    }
}
