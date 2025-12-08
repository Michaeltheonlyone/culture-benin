<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le profil | Portail Culturel du Bénin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Laravel Assets -->
    @if (config('app.env') !== 'production')
        @vite('resources/css/app.css')
    @else
        <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    @endif

    <!-- Theme Assets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-blue: #1e40af;
            --accent-gold: #d97706;
            --light-bg: #f8fafc;
            --card-white: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-light: #e2e8f0;
            --success-green: #059669;
            --hover-blue: #3b82f6;
            --danger-red: #dc2626;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
        }
        
        .text-title {
            font-family: 'Playfair Display', serif;
        }
        
        .card-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="text-gray-800">

<!-- Top Navigation -->
<nav class="sticky top-0 z-50 py-4 px-6 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('frontend.contenus.feed') }}" class="flex items-center space-x-4 group">
            <div class="relative">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center shadow">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-amber-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-title text-gray-900 group-hover:text-blue-700 transition">
                    Portail Culturel <span class="text-blue-700">du Bénin</span>
                </h1>
                <p class="text-sm text-gray-600">Partagez et découvrez le patrimoine</p>
            </div>
        </a>

        <div class="flex items-center space-x-4">
            <a href="{{ route('frontend.profile') }}" 
               class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm font-medium">
                <i class="fas fa-user mr-2"></i>Mon Profil
            </a>
            
            <a href="{{ route('frontend.contenus.feed') }}" 
               class="px-4 py-2 text-gray-600 hover:text-blue-700 transition duration-300 text-sm font-medium">
                <i class="fas fa-home mr-2"></i>Accueil
            </a>
        </div>
    </div>
</nav>

<div class="max-w-4xl mx-auto py-8 px-4">
    <!-- Back Navigation -->
    <div class="mb-6">
        <a href="{{ route('frontend.profile') }}" 
           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium">
            <i class="fas fa-arrow-left"></i>
            Retour au profil
        </a>
    </div>

    <!-- Main Edit Card -->
    <div class="bg-white rounded-2xl p-6 border border-gray-200 card-shadow">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-user-edit text-white text-xl"></i>
                </div>
                <span>Modifier mon profil</span>
            </h1>
            <p class="text-gray-600 mt-2">Mettez à jour vos informations personnelles</p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center gap-3 text-green-800">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center gap-3 text-red-800 mb-2">
                    <i class="fas fa-exclamation-circle text-red-600"></i>
                    <span class="font-medium">Veuillez corriger les erreurs suivantes :</span>
                </div>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Form -->
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Personal Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-blue-600"></i>Prénom
                    </label>
                    <input type="text" 
                           name="prenom" 
                           value="{{ old('prenom', $user->prenom) }}"
                           class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <!-- Last Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user-tag mr-2 text-blue-600"></i>Nom
                    </label>
                    <input type="text" 
                           name="nom" 
                           value="{{ old('nom', $user->nom) }}"
                           class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i>Adresse email
                    </label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email', $user->email) }}"
                           class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <!-- Language -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-language mr-2 text-blue-600"></i>Langue préférée
                    </label>
                    <select name="id_langue"
                            class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Sélectionnez une langue</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id_langue }}"
                                    {{ old('id_langue', $user->id_langue) == $langue->id_langue ? 'selected' : '' }}>
                                {{ $langue->nom_langue }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Profile Picture -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-camera mr-2 text-blue-600"></i>Photo de profil
                </h3>
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <!-- Current Photo -->
                    <div class="flex-shrink-0">
                        @php
                            $photoUrl = $user->photo ? (strpos($user->photo, 'http') === 0 ? $user->photo : asset('storage/' . $user->photo)) : asset('photos/default.jpeg');
                        @endphp
                        <img src="{{ $photoUrl }}"
                             alt="Photo actuelle"
                             class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg"
                             onerror="this.src='{{ asset('photos/default.jpeg') }}'">
                        <div class="text-center mt-2 text-sm text-gray-600">Photo actuelle</div>
                    </div>

                    <!-- Upload New -->
                    <div class="flex-1">
                        <div class="p-6 rounded-lg bg-blue-50 border border-blue-200">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                <i class="fas fa-cloud-upload-alt mr-2 text-blue-600"></i>
                                Télécharger une nouvelle photo
                            </label>
                            <input type="file" 
                                   name="photo" 
                                   accept="image/*"
                                   class="w-full p-3 rounded-lg bg-white border border-gray-300 text-gray-900">
                            <p class="text-sm text-gray-500 mt-2">
                                Formats acceptés : JPG, PNG, GIF. Taille max : 5MB
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cover Photo -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-image mr-2 text-blue-600"></i>Image d'en-tête
                </h3>
                <div class="space-y-4">
                    <!-- Current Header -->
                    @if($user->header)
                        <div>
                            <div class="text-sm font-medium text-gray-700 mb-2">Image actuelle :</div>
                            @php
                                $headerUrl = strpos($user->header, 'http') === 0 ? $user->header : asset('storage/' . $user->header);
                            @endphp
                            <img src="{{ $headerUrl }}"
                                 alt="En-tête actuel"
                                 class="w-full h-48 object-cover rounded-lg border border-gray-300"
                                 onerror="this.src='{{ asset('headers/default.jpeg') }}'">
                        </div>
                    @endif

                    <!-- Upload New -->
                    <div class="p-6 rounded-lg bg-blue-50 border border-blue-200">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            <i class="fas fa-cloud-upload-alt mr-2 text-blue-600"></i>
                            Télécharger une nouvelle image d'en-tête
                        </label>
                        <input type="file" 
                               name="header" 
                               accept="image/*"
                               class="w-full p-3 rounded-lg bg-white border border-gray-300 text-gray-900">
                        <p class="text-sm text-gray-500 mt-2">
                            Format recommandé : 1200×400px. Formats acceptés : JPG, PNG
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('frontend.profile') }}" 
                   class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition duration-300">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-medium transition duration-300 shadow-md">
                    <i class="fas fa-save mr-2"></i>Sauvegarder les modifications
                </button>
            </div>
        </form>
    </div>

    <!-- Delete Account Card -->
    <div class="bg-white rounded-2xl p-6 border border-red-200 card-shadow mt-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h2 class="text-xl font-bold text-gray-900">Zone dangereuse</h2>
        </div>
        
        <div class="p-4 bg-red-50 rounded-lg mb-6">
            <p class="text-red-800">
                <i class="fas fa-info-circle mr-2"></i>
                La suppression de votre compte est irréversible. Tous vos contenus, commentaires et données seront définitivement supprimés.
            </p>
        </div>

        <form method="POST" action="{{ route('profile.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-red-700 mb-2">
                        <i class="fas fa-key mr-2"></i>
                        Confirmez avec votre mot de passe
                    </label>
                    <input type="password" 
                           name="password"
                           placeholder="Votre mot de passe"
                           class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 border border-red-300 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                           required>
                </div>

                <div class="flex justify-end">
                    <button type="button"
                            onclick="confirmDelete()"
                            class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-medium transition duration-300">
                        <i class="fas fa-trash-alt mr-2"></i>Supprimer mon compte
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm('⚠️ Êtes-vous certain de vouloir supprimer votre compte ?\n\nCette action est définitive et supprimera tous vos contenus.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

</body>
</html>