<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\TypeMedia;
use App\Models\Region;
use App\Models\Langue;
use App\Models\User;


class FrontendController extends Controller
{
    // For authenticated frontend dashboard (optional)
    public function home(Request $request)
    {
        $query = Contenu::with([
            'user','commentaires.user','medias','typeContenu','region','typeMedia','langue'
        ])->latest();

        if ($request->filled('id_region')) {
            $query->where('id_region', $request->id_region);
        }
        if ($request->filled('id_langue')) {
            $query->where('id_langue', $request->id_langue);
        }
        if ($request->filled('id_type_contenu')) {
            $query->where('id_type_contenu', $request->id_type_contenu);
        }
        if ($request->filled('id_type_media')) {
            $query->where('id_type_media', $request->id_type_media);
        }

        $contents     = $query->paginate(20);
        $regions      = Region::all();
        $typesMedia   = TypeMedia::all();
        $typesContenu = TypeContenu::all();
        $langues      = Langue::all();
        $random       = Contenu::inRandomOrder()->take(2)->get();
        $topProfiles  = User::inRandomOrder()->take(3)->get();

        // Initialize filter variables
        $type = null;
        $region = null;

        return view('frontend.contenus.feed', compact(
            'contents',
            'regions',
            'typesMedia',
            'typesContenu',
            'langues',
            'random',
            'topProfiles',
            'type',
            'region'
        ));
    }

    // Public welcome page
    public function welcome()
    {
        if (auth()->check()) {
            return redirect()->route('frontend.contenus.feed');
        }

        $typecontenus = TypeContenu::all();
        $regions = Region::all();

        return view('welcome', compact('typecontenus', 'regions'));
    }

    // Show contenus filtered by type
    public function showByType($id)
    {
        $type = TypeContenu::findOrFail($id);
        $contents = Contenu::where('id_type_contenu', $id)
            ->with(['user', 'medias', 'typeContenu', 'region', 'langue'])
            ->latest()
            ->paginate(20);

        // Get all sidebar data
        $regions = Region::all();
        $typesContenu = TypeContenu::all();
        $typesMedia = TypeMedia::all();
        $langues = Langue::all();
        
        // Get sidebar random data
        $random = Contenu::inRandomOrder()->take(2)->get();
        $topProfiles = User::inRandomOrder()->take(3)->get();

        // Initialize region variable as null
        $region = null;

        return view('frontend.contenus.feed', compact(
            'contents', 'type', 'regions', 'typesContenu', 
            'typesMedia', 'langues', 'random', 'topProfiles', 'region'
        ));
    }

    // Show contenus filtered by region
    public function showByRegion($id)
    {
        $region = Region::findOrFail($id);
        $contents = Contenu::where('id_region', $id)
            ->with(['user', 'medias', 'typeContenu', 'region', 'langue'])
            ->latest()
            ->paginate(20);

        // Get all sidebar data
        $regions = Region::all();
        $typesContenu = TypeContenu::all();
        $typesMedia = TypeMedia::all();
        $langues = Langue::all();
        
        // Get sidebar random data
        $random = Contenu::inRandomOrder()->take(2)->get();
        $topProfiles = User::inRandomOrder()->take(3)->get();

        // Initialize type variable as null
        $type = null;

        return view('frontend.contenus.feed', compact(
            'contents', 'region', 'regions', 'typesContenu', 
            'typesMedia', 'langues', 'random', 'topProfiles', 'type'
        ));
    }

    public function showFront($id)
    {    
        $regions = Region::all();
        $typesContenu = TypeContenu::all();
        $typesMedia = TypeMedia::all();
        $langues = Langue::all();
        $contenu = Contenu::with(['user','medias','commentaires'])->findOrFail($id);
        
        // Get sidebar data
        $random = Contenu::where('id', '!=', $id)->inRandomOrder()->take(2)->get();
        $topProfiles = User::inRandomOrder()->take(3)->get();
        
        return view('frontend.contenus.show', compact(
            'contenu', 'regions', 'typesContenu', 'typesMedia', 'langues',
            'random', 'topProfiles'
        ));
    }

    public function search(Request $request)
    {
        $q = $request->get('q', '');
        
        if (empty($q)) {
            return redirect()->route('frontend.contenus.feed');
        }
        
        // Get data needed for sidebar (same as feed)
        $regions = Region::all();
        $typesContenu = TypeContenu::all();
        $typesMedia = TypeMedia::all();
        $langues = Langue::all();
        
        // Search in contenus
        $contenus = Contenu::where(function($query) use ($q) {
                $query->where('titre', 'like', "%{$q}%")
                    ->orWhere('contenu', 'like', "%{$q}%");
            })
            ->with(['typeContenu', 'region', 'medias', 'auteur', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        // Search in users (profiles) - show 3 initially
        $profiles = User::where(function($query) use ($q) {
                $query->where('prenom', 'like', "%{$q}%")
                    ->orWhere('nom', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            })
            ->limit(3)
            ->get();
        
        // Get total profile count for "Afficher plus"
        $profileCount = User::where(function($query) use ($q) {
                $query->where('prenom', 'like', "%{$q}%")
                    ->orWhere('nom', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            })
            ->count();
        
        // Get sidebar data
        $randomUsers = User::inRandomOrder()->limit(3)->get();
        $randomContent = Contenu::inRandomOrder()->limit(2)->get();
        
        return view('frontend.contenus.search', compact(
            'q', 'contenus', 'profiles', 'profileCount',
            'regions', 'typesContenu', 'typesMedia', 'langues',
            'randomUsers', 'randomContent'
        ));
    }
    
}