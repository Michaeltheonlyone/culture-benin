<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View; 


class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'id_langue' => 'required|exists:langues,id_langue',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'header' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Handle photo upload
        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('photos', 'public')
            : 'photos/default.jpeg';

        // Handle header upload
        $headerPath = $request->hasFile('header')
            ? $request->file('header')->store('headers', 'public')
            : 'headers/default.jpeg';

        // Default role = Auteur
        $auteurRole = Role::where('name', 'Auteur')->first();

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'date_inscription' => now(),
            'statut' => 'actif',
            'photo' => $photoPath,
            'header' => $headerPath,
            'id_role' => $auteurRole->id,
            'id_langue' => $request->id_langue,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('frontend.contenus.feed');
    }

    public function create(): View
    {
        // Pass langues to the view for dropdown
        $langues = \App\Models\Langue::all();
        return view('register', compact('langues'));
    }
}

