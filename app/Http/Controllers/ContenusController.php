<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\TypeMedia;
use App\Models\Region;
use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ContenusController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with(['typeContenu','typeMedia','region','medias','auteur'])
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('backend.contenus.index', compact('contenus'));
    }

    public function create()
    {
        $types = TypeContenu::all();
        $medias = TypeMedia::all();
        $regions = Region::all();
        return view('backend.contenus.create', compact('types','medias','regions'));
    }

    public function store(Request $request)
    {
        // use model instances to derive real table/key names (avoid hardcoded table names)
        $typeContenuModel = new TypeContenu;
        $typeMediaModel   = new TypeMedia;
        $regionModel      = new Region;

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'id_type_contenu' => 'nullable|exists:'.$typeContenuModel->getTable().','.$typeContenuModel->getKeyName(),
            'id_type_media'   => 'nullable|exists:'.$typeMediaModel->getTable().','.$typeMediaModel->getKeyName(),
            'id_region'       => 'nullable|exists:'.$regionModel->getTable().','.$regionModel->getKeyName(),
            'parent_id'       => 'nullable|exists:'.$this->getModelTable(Contenu::class).',id',
            'id_langue' => 'required|exists:langues,id_langue'
        ]);

        $data = $request->only(['titre','contenu','id_type_contenu','id_type_media','id_region','parent_id']);
        $data['id_utilisateur'] = Auth::user()->id_utilisateur ?? Auth::id();

        $contenu = Contenu::create($data);

        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $file) {
                $uploadedFile = $file->storeOnCloudinary('culture-benin');
                $url = $uploadedFile->getSecurePath();
                
                Media::create([
                    'url' => $url,
                    'titre_media' => $file->getClientOriginalName(),
                    'id_contenu' => $contenu->id,
                ]);
            }
        }

        return redirect()->route('backend.contenus.index')->with('success', 'Contenu ajouté.');
    }

    public function storeFront(Request $request)
    {
        $typeContenuModel = new TypeContenu;
        $typeMediaModel   = new TypeMedia;
        $regionModel      = new Region;

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'id_type_contenu' => 'nullable|exists:'.$typeContenuModel->getTable().','.$typeContenuModel->getKeyName(),
            'id_type_media'   => 'nullable|exists:'.$typeMediaModel->getTable().','.$typeMediaModel->getKeyName(),
            'id_region'       => 'nullable|exists:'.$regionModel->getTable().','.$regionModel->getKeyName(),
            'parent_id'       => 'nullable|exists:'.$this->getModelTable(Contenu::class).',id',
            'id_langue' => 'required|exists:langues,id_langue'
        ]);

        $data = $request->only(['titre','contenu','id_type_contenu','id_type_media','id_region','parent_id','id_langue']);
        $data['id_utilisateur'] = Auth::user()->id_utilisateur ?? Auth::id();

        $contenu = Contenu::create($data);

        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $file) {
                $uploadedFile = $file->storeOnCloudinary('culture-benin');
                $url = $uploadedFile->getSecurePath();
                
                Media::create([
                    'url' => $url,
                    'titre_media' => $file->getClientOriginalName(),
                    'id_type_media' => $request->id_type_media,
                    'id_contenu' => $contenu->id,
                ]);
            }
        }

        return redirect()->route('frontend.contenus.feed')->with('success', 'Publication ajoutée.');
    }

    public function show($id)
    {
        $contenu = Contenu::with(['typeContenu','typeMedia','region','parent','enfants','medias','auteur','commentaires'])->findOrFail($id);
        return view('backend.contenus.show', compact('contenu'));
    }

    public function edit($id)
    {
        $contenu = Contenu::findOrFail($id);
        $types = TypeContenu::all();
        $medias = TypeMedia::all();
        $regions = Region::all();
        return view('backend.contenus.edit', compact('contenu','types','medias','regions'));
    }

    public function update(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);

        $typeContenuModel = new TypeContenu;
        $typeMediaModel   = new TypeMedia;
        $regionModel      = new Region;

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'id_type_contenu' => 'nullable|exists:'.$typeContenuModel->getTable().','.$typeContenuModel->getKeyName(),
            'id_type_media'   => 'nullable|exists:'.$typeMediaModel->getTable().','.$typeMediaModel->getKeyName(),
            'id_region'       => 'nullable|exists:'.$regionModel->getTable().','.$regionModel->getKeyName(),
            'parent_id'       => 'nullable|exists:'.$this->getModelTable(Contenu::class).',id',
            'id_langue' => 'required|exists:langues,id_langue'
        ]);

        $data = $request->only(['titre','contenu','id_type_contenu','id_type_media','id_region','parent_id']);
        $contenu->update($data);

        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $file) {
                $uploadedFile = $file->storeOnCloudinary('culture-benin');
                $url = $uploadedFile->getSecurePath();
                
                Media::create([
                    'url' => $url,
                    'titre_media' => $file->getClientOriginalName(),
                    'id_contenu' => $contenu->id,
                ]);
            }
        }

        return redirect()->route('backend.contenus.index')->with('success', 'Contenu mis à jour.');
    }

    public function destroy($id)
    {
        $contenu = Contenu::findOrFail($id);

        foreach ($contenu->medias as $m) {
            // Files are on Cloudinary, just delete database record
            $m->delete();
        }

        $contenu->delete();

        return redirect()->route('backend.contenus.index')->with('success', 'Contenu supprimé.');
    }

    private function getKeyForModel($modelClass)
    {
        $m = new $modelClass;
        return $m->getKeyName();
    }

    private function getModelTable($modelClass)
    {
        $m = new $modelClass;
        return $m->getTable();
    }
    
    // Show all contenus of a given typecontenu (public feed)
    public function indexByType($id)
    {
        $type = TypeContenu::findOrFail($id);

        $contenus = Contenu::with(['typeContenu','typeMedia','region','medias','auteur'])
            ->where('id_type_contenu', $id)
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('frontend.contenus.feed', compact('type','contenus'));
    }

    // Show a single contenu (public view)
    public function showFront($id)
    {
        $contenu = Contenu::with(['typeContenu','typeMedia','region','medias','auteur','commentaires'])
            ->findOrFail($id);

        return view('frontend.contenus.show', compact('contenu'));
    }
}