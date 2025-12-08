<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\TypeMedia;
use App\Models\Contenu;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $utilisateur = Auth::user();
        $role = strtolower((string) data_get($utilisateur, 'role.name', $utilisateur->role ?? ''));

        // Admin/manager → backend dashboard
        if (in_array($role, ['administrateur', 'manageur'], true)) {
            $contenus = $utilisateur->contenus()->with('commentaires')->get();
            return view('backend.dashboard.index', compact('utilisateur', 'contenus'));
        }

        // Non‑admin → feed with all required variables
        $query = Contenu::with([
            'user','commentaires.user','medias','typeContenu','region','typeMedia'
        ])->latest();

        $contents    = $query->paginate(20);
        $regions     = Region::all();
        $typesMedia  = TypeMedia::all();
        $random      = Contenu::inRandomOrder()->take(2)->get();
        $topProfiles = User::inRandomOrder()->take(3)->get();

        return view('frontend.contenus.feed', compact(
            'utilisateur',
            'contents',
            'regions',
            'typesMedia',
            'random',
            'topProfiles'
        ));
    }
}