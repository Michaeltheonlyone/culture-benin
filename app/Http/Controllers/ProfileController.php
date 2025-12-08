<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contenu;
use App\Models\Region;
use App\Models\TypeMedia;
use App\Models\User;
use App\Models\Langue;
use App\Models\TypeContenu;
use App\Helpers\UrlEncrypter;

class ProfileController extends Controller
{
    /**
     * Show the frontend profile page with user info + posts.
     */
    public function show(Request $request)
    {
        $user = $request->user();

        // User's posts with related data
        $posts = Contenu::with(['medias', 'typeContenu', 'region'])
            ->where('id_utilisateur', $user->id)
            ->orderByDesc('created_at')
            ->get();

        // Dropdowns for "Poster" modal
        $regions = Region::orderBy('nom_region')->get();
        $typesMedia = TypeMedia::orderBy('nom_media')->get();
        
        // ADD THIS LINE - Get languages for dropdown
        $langues = Langue::orderBy('nom_langue')->get();
        $typesContenu = TypeContenu::orderBy('nom_contenu')->get();

        return view('frontend.profile', compact('user', 'posts', 'regions', 'typesMedia', 'langues', 'typesContenu'));
    }

    /**
     * Display the user's profile form (edit).
     */
    public function edit()
    {
        $user = Auth::user();
        $langues = Langue::all(); // Make sure to fetch languages
        
        return view('frontend.profile.edit', compact('user', 'langues'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = $request->user();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users/photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // ProfileController.php - update the showPublic() method
    public function showPublic($encryptedId)
    {
        $id = UrlEncrypter::decrypt($encryptedId);
        $user = User::with(['langue', 'contenus.medias', 'contenus.typeContenu', 'contenus.region'])
                    ->findOrFail($id);

        $posts = $user->contenus()->latest()->get();

        // ADD THESE LINES - Get data for dropdowns
        $regions = Region::orderBy('nom_region')->get();
        $typesMedia = TypeMedia::orderBy('nom_media')->get();
        $langues = Langue::orderBy('nom_langue')->get();
        $typesContenu = TypeContenu::orderBy('nom_contenu')->get();

        return view('frontend.profile.public', compact('user', 'posts', 'regions', 'typesMedia', 'langues', 'typesContenu'));
    }
}