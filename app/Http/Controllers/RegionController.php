<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index() {
        $regions = Region::all();
        return view('backend.region.index', compact('regions'));
    }

    public function create() {
        return view('backend.region.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255',
        ]);

        Region::create($request->only('nom_region','description','population','superficie','localisation'));

        return redirect()->route('backend.region.index')->with('success', 'Region ajoutée avec succès.');
    }

    public function show($id) {
        $region = Region::findOrFail($id);
        return view('backend.region.show', compact('region'));
    }

    public function edit($id) {
        $region = Region::findOrFail($id);
        return view('backend.region.edit', compact('region'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255',
        ]);

        $region = Region::findOrFail($id);
        $region->update($request->only('nom_region','description','population','superficie','localisation'));

        return redirect()->route('backend.region.index')->with('success', 'Region mise à jour avec succès.');
    }

    public function destroy($id) {
        $region = Region::findOrFail($id);
        $region->delete();
        return redirect()->route('backend.region.index')->with('success', 'Region supprimée.');
    }
}
