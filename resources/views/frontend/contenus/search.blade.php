<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche : "{{ $q }}" | Portail Culturel du Bénin</title>
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
        .card-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .modal {
            position: fixed;
            inset: 0;
            display: none;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .modal.open {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="text-gray-800">

<!-- Top Navigation - SIMPLIFIED: Logo + Profile only -->
<nav class="sticky top-0 z-50 py-4 px-6 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo - Clickable to refresh page -->
        <a href="{{ url('/') }}" onclick="location.reload(); return false;" class="flex items-center space-x-4 group">
            <div class="relative">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center shadow group-hover:scale-105 transition">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-amber-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-title text-gray-900 group-hover:text-blue-700 transition">
                    Portail Culturel <span class="text-blue-700">du Bénin</span>
                </h1>
                <p class="text-sm text-gray-600">Valoriser le patrimoine</p>
            </div>
        </a>

        <!-- Right side: Only Profile button when logged in -->
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('frontend.profile') }}" 
                   class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-semibold transition duration-300 shadow flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    <span class="hidden sm:inline">Mon Profil</span>
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="px-4 py-2 text-sm text-gray-600 hover:text-red-600 transition duration-300">
                        <i class="fas fa-sign-out-alt mr-1"></i>
                        <span class="hidden sm:inline">Déconnexion</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 text-blue-700 hover:text-blue-800 transition duration-300 text-sm">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm">
                    Inscription
                </a>
            @endauth
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto py-6 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        
        <!-- LEFT SIDEBAR - Search Filters & Create Post -->
        <aside class="lg:col-span-1 space-y-6 sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto">
            <!-- Search Box -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <h3 class="font-bold text-lg text-gray-900 mb-4">
                    <i class="fas fa-search mr-2 text-blue-600"></i>Recherche
                </h3>
                <form action="{{ route('contenus.search') }}" method="GET" class="space-y-3">
                    <div class="relative">
                        <input type="text" 
                               name="q" 
                               value="{{ $q }}"
                               placeholder="Rechercher des contenus..."
                               class="w-full p-3 pl-10 rounded-lg bg-gray-50 text-gray-800 border border-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 rounded-lg font-semibold transition duration-300 shadow">
                        <i class="fas fa-search mr-2"></i>Rechercher
                    </button>
                </form>
            </div>

            <!-- Create Post Button -->
            @auth
                <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                    <button onclick="openPostModal()"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 rounded-lg font-semibold transition duration-300 shadow flex items-center justify-center gap-2">
                        <i class="fas fa-plus"></i>
                        Créer un contenu
                    </button>
                </div>
            @endauth

            <!-- Search Stats -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <h3 class="font-bold text-lg text-gray-900 mb-4">📊 Résultats</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Contenus trouvés</span>
                        <span class="font-bold text-blue-700">{{ $contenus->total() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Profils trouvés</span>
                        <span class="font-bold text-blue-700">{{ $profileCount ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Requête</span>
                        <span class="font-medium text-gray-900">"{{ $q }}"</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT - Search Results -->
        <main class="lg:col-span-2 space-y-6 overflow-y-auto max-h-[calc(100vh-5rem)] pr-2">
            <!-- Search Header -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            <i class="fas fa-search mr-2 text-blue-600"></i>
                            Résultats pour "{{ $q }}"
                        </h2>
                        <p class="text-gray-600 mt-1">
                            {{ $contenus->total() }} résultat(s) trouvé(s)
                        </p>
                    </div>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-filter mr-1"></i>
                        Recherche
                    </div>
                </div>
            </div>

            <!-- Profiles Section (First 3 + Afficher plus) -->
            @if(isset($profiles) && $profiles->count() > 0)
                <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900">
                            <i class="fas fa-users mr-2 text-blue-600"></i>
                            Profils ({{ $profileCount ?? $profiles->count() }})
                        </h3>
                        @if(($profileCount ?? 0) > 3)
                            <button onclick="showAllProfiles()"
                                    class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                Afficher plus
                            </button>
                        @endif
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($profiles->take(3) as $profile)
                            <a href="{{ route('frontend.profile.show', $profile->id) }}" 
                               class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition duration-300 group">
                                <div class="relative">
                                    @php
                                        $photoUrl = $profile->photo ? (strpos($profile->photo, 'http') === 0 ? $profile->photo : asset('storage/' . $profile->photo)) : asset('photos/default.jpeg');
                                    @endphp
                                    <img src="{{ $photoUrl }}"
                                         alt="{{ $profile->prenom }}"
                                         class="w-12 h-12 rounded-full object-cover border-2 border-white shadow"
                                         onerror="this.src='{{ asset('photos/default.jpeg') }}'">
                                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-900 group-hover:text-blue-700">
                                        {{ $profile->prenom }} {{ $profile->nom }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        @if($profile->langue)
                                            {{ $profile->langue->nom_langue }}
                                        @endif
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Contenus Section -->
            <div class="space-y-6">
                @forelse($contenus as $contenu)
                    <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                        <!-- Author Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white">
                                    {{ substr($contenu->auteur->prenom ?? $contenu->user->name ?? 'A', 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">
                                        {{ $contenu->auteur->prenom ?? '' }} {{ $contenu->auteur->nom ?? $contenu->user->name ?? 'Utilisateur' }}
                                    </div>
                                    <div class="text-sm text-gray-600 flex items-center gap-2">
                                        <span>{{ $contenu->created_at->diffForHumans() }}</span>
                                        @if($contenu->region)
                                            <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-xs">
                                                {{ $contenu->region->nom_region }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($contenu->typeContenu)
                                <div class="text-sm px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 font-medium">
                                    {{ $contenu->typeContenu->nom }}
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <a href="{{ route('contenus.show', $contenu->id) }}" class="block group">
                            @if($contenu->titre)
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition duration-300 mb-2">
                                    {{ $contenu->titre }}
                                </h3>
                            @endif
                            
                            <div class="text-gray-700 mb-4 whitespace-pre-line leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($contenu->contenu, 300) }}
                                @if(strlen($contenu->contenu) > 300)
                                    <span class="text-blue-600 font-semibold">Lire la suite...</span>
                                @endif
                            </div>
                        </a>

                        <!-- Media Preview -->
                        @if ($contenu->medias->count())
                            <div class="mb-4 rounded-xl overflow-hidden border border-gray-200">
                                @foreach ($contenu->medias->take(1) as $media)
                                    @php
                                        // Get media URL (same logic as feed)
                                        $mediaUrl = null;
                                        if (strpos($media->url, 'http') === 0) {
                                            $mediaUrl = $media->url;
                                        } elseif (strpos($media->url, 'storage/') === 0) {
                                            $mediaUrl = asset($media->url);
                                        } elseif (function_exists('Storage') && method_exists('Storage', 'url')) {
                                            try {
                                                $mediaUrl = Storage::url($media->url);
                                            } catch (\Exception $e) {
                                                $mediaUrl = asset('storage/' . $media->url);
                                            }
                                        } else {
                                            $mediaUrl = asset('storage/' . $media->url);
                                        }
                                    @endphp
                                    
                                    @switch($media->typeMedia?->nom_media)
                                        @case('Image')
                                            <img src="{{ $mediaUrl }}"
                                                 alt="{{ $media->titre_media ?? 'Image' }}"
                                                 class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300"
                                                 onerror="this.src='{{ asset('assets/images/default.jpg') }}'">
                                            @break
                                        @case('Video')
                                            <div class="relative bg-black">
                                                <video class="w-full h-64 object-contain" controls playsinline preload="metadata">
                                                    <source src="{{ $mediaUrl }}" type="video/mp4">
                                                    <source src="{{ $mediaUrl }}" type="video/webm">
                                                </video>
                                            </div>
                                            @break
                                        @case('Audio')
                                            <div class="p-4 bg-gray-50">
                                                <audio controls class="w-full">
                                                    <source src="{{ $mediaUrl }}" type="audio/mpeg">
                                                </audio>
                                            </div>
                                            @break
                                    @endswitch
                                @endforeach
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div class="flex gap-6">
                                <!-- Comment -->
                                <button onclick="openCommentModal({{ $contenu->id }})"
                                        class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition duration-300">
                                    <div class="w-8 h-8 rounded-full bg-gray-100 hover:bg-blue-100 flex items-center justify-center transition duration-300">
                                        <i class="fas fa-comment text-gray-500"></i>
                                    </div>
                                    <span>Commenter</span>
                                </button>

                                <!-- Share -->
                                <form action="{{ route('contenus.storeFront') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{ $contenu->id }}">
                                    <input type="hidden" name="titre" value="{{ $contenu->titre }}">
                                    <input type="hidden" name="contenu" value="{{ $contenu->contenu }}">
                                    <input type="hidden" name="id_region" value="{{ $contenu->id_region }}">
                                    <input type="hidden" name="id_type_media" value="{{ $contenu->id_type_media }}">
                                    <input type="hidden" name="id_type_contenu" value="{{ $contenu->id_type_contenu }}">
                                    <button type="submit"
                                            class="flex items-center gap-2 text-gray-600 hover:text-green-600 transition duration-300">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 hover:bg-green-100 flex items-center justify-center transition duration-300">
                                            <i class="fas fa-retweet text-gray-500"></i>
                                        </div>
                                        <span>Partager</span>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- View Count -->
                            <div class="text-sm text-gray-500 flex items-center gap-1">
                                <i class="fas fa-eye"></i>
                                <span>1.2k vues</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl p-8 border border-gray-200 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-search text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Aucun résultat</h3>
                        <p class="text-gray-600 mb-4">
                            Aucun contenu ne correspond à "{{ $q }}"
                        </p>
                        <a href="{{ route('frontend.contenus.feed') }}" 
                           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold">
                            <i class="fas fa-arrow-left"></i>
                            Retour au flux
                        </a>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if($contenus->hasPages())
                    <div class="bg-white rounded-xl p-5 border border-gray-200">
                        {{ $contenus->links() }}
                    </div>
                @endif
            </div>
        </main>

         <!-- RIGHT SIDEBAR - Discover & Random Users -->
<aside class="lg:col-span-1 space-y-6 sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto">
    <!-- Search Box (same as feed) -->
    <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
        <form action="{{ route('contenus.search') }}" method="GET" class="relative">
            <input type="text" 
                   name="q" 
                   placeholder="Rechercher du contenu..."
                   class="w-full p-4 pl-12 rounded-lg bg-gray-50 text-gray-800 border border-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </form>
    </div>

    <!-- Discover Section (Random Content) -->
    <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
        <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center">
            <i class="fas fa-compass mr-2 text-blue-600"></i>À découvrir
        </h3>
        <div class="space-y-4">
            @forelse($randomContent as $r)
                <a href="{{ route('contenus.show', $r->id) }}" 
                   class="block p-3 rounded-lg hover:bg-blue-50 transition duration-300 border border-gray-100">
                    <div class="font-bold text-gray-900 group-hover:text-blue-700 transition duration-300">
                        {{ \Illuminate\Support\Str::limit($r->titre ?? 'Sans titre', 40) }}
                    </div>
                    <div class="text-sm text-gray-600 mt-1">
                        {{ \Illuminate\Support\Str::limit($r->contenu, 60) }}
                    </div>
                    <div class="text-xs text-blue-600 mt-2 flex items-center gap-1">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $r->region->nom_region ?? 'Bénin' }}
                    </div>
                </a>
            @empty
                <div class="text-gray-500 text-sm text-center py-4">
                    <i class="fas fa-inbox text-xl mb-2 block"></i>
                    Aucun contenu à découvrir
                </div>
            @endforelse
        </div>
    </div>

    <!-- 3 RANDOM USERS (Contributeurs actifs) -->
    <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
        <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center">
            <i class="fas fa-crown mr-2 text-amber-500"></i>Contributeurs actifs
        </h3>
        <div class="space-y-3">
            @forelse($randomUsers as $user)
                <a href="{{ route('frontend.profile.show', $user->id) }}" 
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition duration-300 group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white">
                        {{ substr($user->name ?? ($user->prenom.' '.$user->nom), 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <div class="font-semibold text-gray-900 group-hover:text-blue-700 transition duration-300">
                            {{ \Illuminate\Support\Str::limit($user->name ?? ($user->prenom.' '.$user->nom), 15) }}
                        </div>
                        <div class="text-xs text-gray-600">{{ $user->contenus_count ?? 0 }} contenus</div>
                    </div>
                </a>
            @empty
                <div class="text-gray-500 text-sm text-center py-3">
                    Aucun profil trouvé
                </div>
            @endforelse
        </div>
    </div>
</aside>
    </div>
</div>

<!-- POST MODAL -->
<div id="postModal" class="modal">
    <div class="bg-white rounded-2xl w-full max-w-2xl p-6 border border-gray-300 shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">
                <i class="fas fa-plus-circle mr-2 text-blue-600"></i>Créer un contenu
            </h2>
            <button onclick="closePostModal()" class="text-gray-500 hover:text-gray-700 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="{{ route('contenus.storeFront') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <input type="text" name="titre"
                       class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 placeholder-gray-500 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Titre du contenu" required>

                <textarea name="contenu"
                          class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 placeholder-gray-500 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          rows="4" placeholder="Décrivez votre contenu..." required></textarea>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <select name="id_region"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">🌍 Région</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->{$region->getKeyName()} }}">{{ $region->nom_region }}</option>
                        @endforeach
                    </select>

                    <select name="id_type_contenu"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">📝 Type de contenu</option>
                        @foreach($typesContenu as $type)
                            <option value="{{ $type->id_type_contenu }}">{{ $type->nom_contenu }}</option>
                        @endforeach
                    </select>

                    <select name="id_type_media"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">🎬 Type de média</option>
                        @foreach($typesMedia as $type)
                            <option value="{{ $type->{$type->getKeyName()} }}">{{ $type->nom_media }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="p-4 rounded-lg bg-gray-50 border border-gray-300">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-cloud-upload-alt mr-2 text-blue-600"></i>Télécharger des médias
                    </label>
                    <input type="file" name="medias[]" accept="image/*,video/*,audio/*,.pdf" multiple 
                           class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="flex justify-between pt-4 border-t border-gray-200">
                    <button type="button" onclick="closePostModal()"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition duration-300">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-semibold transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>Publier
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- COMMENT MODAL -->
<div id="commentModal" class="modal">
    <div class="bg-white rounded-2xl w-full max-w-lg p-6 border border-gray-300 shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">
                <i class="fas fa-comment-medical mr-2 text-blue-600"></i>Ajouter un commentaire
            </h2>
            <button onclick="closeCommentModal()" class="text-gray-500 hover:text-gray-700 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="commentForm" action="{{ route('commentaires.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_contenu" id="comment_contenu_id">

            <div class="space-y-4">
                <textarea name="texte"
                          class="w-full p-4 rounded-lg bg-gray-50 text-gray-900 placeholder-gray-500 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          rows="4" placeholder="Votre commentaire..." required></textarea>

                <div class="flex justify-between pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeCommentModal()"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition duration-300">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-semibold transition duration-300">
                        <i class="fas fa-comment mr-2"></i>Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Post modal
    function openPostModal() {
        document.getElementById('postModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closePostModal() {
        document.getElementById('postModal').classList.remove('open');
        document.body.style.overflow = 'auto';
    }

    // Comment modal
    function openCommentModal(contenuId) {
        document.getElementById('comment_contenu_id').value = contenuId;
        document.getElementById('commentModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeCommentModal() {
        document.getElementById('commentModal').classList.remove('open');
        document.body.style.overflow = 'auto';
        document.querySelector('#commentModal textarea[name="texte"]').value = '';
    }

    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePostModal();
            closeCommentModal();
        }
    });

    // Show all profiles
    function showAllProfiles() {
        alert('Fonctionnalité "Afficher plus" à implémenter');
        // You would typically make an AJAX request here
        // or redirect to a profiles-only search page
    }

    // Logo refresh
    document.querySelector('a[href="{{ url("/") }}"]').addEventListener('click', function(e) {
        e.preventDefault();
        location.reload();
    });
</script>

</body>
</html>