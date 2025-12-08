<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Flux Culturel | Portail Culturel du Bénin</title>
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
        
        /* Star rating */
        .stars label {
            cursor: pointer;
            font-size: 1.5rem;
            color: #cbd5e1;
            transition: all 0.2s ease;
        }
        .stars label:hover {
            color: var(--accent-gold);
            transform: scale(1.2);
        }
        .stars input[type="radio"]:checked ~ label {
            color: var(--accent-gold);
        }
        
        /* Modal */
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
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 3px;
        }
    </style>
</head>
<body class="text-gray-800">

<!-- Top Navigation -->
<nav class="sticky top-0 z-50 py-4 px-6 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Clickable Logo to Feed -->
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
            @auth
                <a href="{{ route('frontend.profile') }}" 
                   class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm font-medium">
                    <i class="fas fa-user mr-2"></i>Mon Profil
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="px-4 py-2 text-sm text-gray-600 hover:text-red-600 transition duration-300">
                        <i class="fas fa-sign-out-alt mr-1"></i>Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 text-blue-700 hover:text-blue-800 transition duration-300 text-sm font-medium">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm font-medium">
                    Inscription
                </a>
            @endauth
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto py-6 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        
        <!-- LEFT SIDEBAR - STICKY -->
        <aside class="lg:col-span-1 space-y-6 sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto">
            <!-- Create Post Card -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center text-white">
                        @auth
                            <span class="font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        @else
                            <i class="fas fa-user"></i>
                        @endauth
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Partagez une découverte</h3>
                        <p class="text-sm text-gray-600">Enrichissez le patrimoine</p>
                    </div>
                </div>
                <button onclick="openPostModal()"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 rounded-xl font-semibold text-center transition duration-300 shadow-md">
                    <i class="fas fa-plus mr-2"></i>Créer un contenu
                </button>
            </div>

            <!-- Quick Filters -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-filter mr-2 text-blue-600"></i>Catégories
                </h3>
                <div class="space-y-3">
                    @foreach($typesContenu->take(4) as $type)
                        <a href="{{ route('frontend.contenus.feed') }}?id_type_contenu={{ $type->id_type_contenu }}" 
                           class="block p-3 rounded-lg hover:bg-blue-50 transition duration-300 border border-gray-100">
                            <div class="font-semibold text-gray-900">{{ $type->nom_contenu }}</div>
                            <div class="text-sm text-gray-600 mt-1">{{ $loop->iteration * 45 }} contenus</div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Stats -->
            {{-- Admin Backoffice Access (Only visible to Admin/Manager) --}}
@auth
    @if(auth()->user()->role && in_array(auth()->user()->role->name, ['Administrateur', 'Manageur']))
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-5 border border-blue-200">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-cog text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900">Accès Admin</h3>
                    <p class="text-sm text-gray-600">Gestion du système</p>
                </div>
            </div>
            
            <a href="{{ route('backend.dashboard.index') }}" 
               class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-4 rounded-xl text-center transition duration-300 flex items-center justify-center gap-2 shadow-md">
                <i class="fas fa-tachometer-alt"></i>
                Tableau de bord
            </a>
        </div>
    @endif
@endauth
        </aside>

        <!-- MAIN FEED - SCROLLABLE -->
        <main class="lg:col-span-2 space-y-6 overflow-y-auto max-h-[calc(100vh-5rem)] pr-2">
            <!-- Filter Bar -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <form action="{{ route('frontend.contenus.feed') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <select name="id_region" class="p-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">🌍 Toutes les régions</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->{$region->getKeyName()} }}"
                                        @selected(request('id_region') == $region->{$region->getKeyName()})>
                                    {{ $region->nom_region }}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="id_langue" class="p-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">🗣️ Toutes les langues</option>
                            @foreach($langues as $langue)
                                <option value="{{ $langue->id_langue }}"
                                        @selected(request('id_langue') == $langue->id_langue)>
                                    {{ $langue->nom_langue }}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="id_type_contenu" class="p-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">📚 Tous les types</option>
                            @foreach($typesContenu as $type)
                                <option value="{{ $type->id_type_contenu }}"
                                        @selected(request('id_type_contenu') == $type->id_type_contenu)>
                                    {{ $type->nom_contenu }}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="id_type_media" class="p-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">🎬 Tous les médias</option>
                            @foreach($typesMedia as $type)
                                <option value="{{ $type->{$type->getKeyName()} }}"
                                        @selected(request('id_type_media') == $type->{$type->getKeyName()})>
                                    {{ $type->nom_media }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-filter"></i> Appliquer les filtres
                    </button>
                </form>
            </div>

            <!-- Feed Content -->
            <div class="space-y-6">
                @foreach ($contents as $contenu)
                    <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                        <!-- Author Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('frontend.profile.show', $contenu->user->id ?? $contenu->auteur->id ?? '#') }}" 
                                   class="flex items-center gap-3 group">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white">
                                        {{ substr($contenu->auteur->prenom ?? $contenu->user->name ?? 'A', 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 group-hover:text-blue-700 transition">
                                            {{ $contenu->auteur->prenom ?? '' }} {{ $contenu->auteur->nom ?? $contenu->user->name ?? 'Utilisateur' }}
                                        </div>
                                        <div class="text-sm text-gray-600 flex items-center gap-2">
                                            <span>{{ $contenu->created_at->diffForHumans() }}</span>
                                            @if($contenu->parent_id)
                                                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                                    <i class="fas fa-retweet mr-1"></i>Partagé
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="text-sm px-3 py-1.5 rounded-full bg-blue-100 text-blue-800 font-medium">
                                {{ $contenu->region->nom_region ?? 'Bénin' }}
                            </div>
                        </div>

                        <!-- Content -->
                        <a href="{{ route('contenus.show', $contenu->id) }}" class="block group">
                            @if($contenu->titre)
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition duration-300 mb-2">
                                    {{ $contenu->titre }}
                                </h3>
                            @endif
                            
                            <div class="text-gray-700 mb-4 whitespace-pre-line leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($contenu->contenu, 280) }}
                                @if(strlen($contenu->contenu) > 280)
                                    <span class="text-blue-600 font-semibold hover:text-blue-800">Lire la suite...</span>
                                @endif
                            </div>
                        </a>

                        <!-- Media Preview -->
                        @if ($contenu->medias->count())
                            <div class="mb-4 rounded-xl overflow-hidden border border-gray-200">
                                @foreach ($contenu->medias->take(1) as $media)
                                    @php
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
                                                 onerror="this.onerror=null; this.src='{{ asset('assets/images/default.jpg') }}'">
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
                                        @case('Document')
                                            <div class="p-4 bg-gray-50">
                                                <a href="{{ $mediaUrl }}" target="_blank"
                                                   class="flex items-center gap-3 text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-file-pdf text-2xl"></i>
                                                    <div>
                                                        <div class="font-medium">{{ $media->titre_media ?? 'Document' }}</div>
                                                        <div class="text-sm text-gray-600">Cliquez pour télécharger</div>
                                                    </div>
                                                </a>
                                            </div>
                                            @break
                                    @endswitch
                                @endforeach
                            </div>
                        @endif

                        <!-- Content Type Badge -->
                        <div class="mb-4">
                            <span class="px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 text-sm font-medium">
                                <i class="fas fa-tag mr-1"></i>
                                {{ $contenu->typeContenu->nom ?? 'Contenu culturel' }}
                            </span>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div class="flex gap-6">
                                <!-- Comment -->
                                <button onclick="openCommentModal({{ $contenu->id }})"
                                        class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition duration-300 group">
                                    <div class="w-8 h-8 rounded-full bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition duration-300">
                                        <i class="fas fa-comment text-gray-500 group-hover:text-blue-600"></i>
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
                                            class="flex items-center gap-2 text-gray-600 hover:text-green-600 transition duration-300 group">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 group-hover:bg-green-100 flex items-center justify-center transition duration-300">
                                            <i class="fas fa-retweet text-gray-500 group-hover:text-green-600"></i>
                                        </div>
                                        <span>Partager</span>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Language Badge -->
                            @if($contenu->langue)
                                <div class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="fas fa-language"></i>
                                    <span>{{ $contenu->langue->nom_langue }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                @if($contents->hasPages())
                    <div class="bg-white rounded-xl p-5 border border-gray-200">
                        {{ $contents->links() }}
                    </div>
                @endif
            </div>
        </main>

        <!-- RIGHT SIDEBAR - STICKY -->
        <aside class="lg:col-span-1 space-y-6 sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto">
            <!-- Search -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <form action="{{ route('contenus.search') }}" method="GET" class="relative">
                    <input type="text" 
                           name="q" 
                           placeholder="Rechercher du contenu..."
                           class="w-full p-4 pl-12 rounded-lg bg-gray-50 text-gray-800 border border-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </form>
            </div>

            <!-- Discover Section -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-compass mr-2 text-blue-600"></i>À découvrir
                </h3>
                <div class="space-y-4">
                    @forelse($random as $r)
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

            <!-- Top Profiles -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 card-shadow">
                <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-crown mr-2 text-amber-500"></i>Contributeurs actifs
                </h3>
                <div class="space-y-3">
                    @forelse($topProfiles as $user)
                        <a href="{{ route('frontend.profile.show', $user->id) }}" 
                           class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition duration-300 group">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center font-bold text-white">
                                {{ substr($user->name ?? ($user->prenom.' '.$user->nom), 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 group-hover:text-blue-700 transition duration-300">
                                    {{ \Illuminate\Support\Str::limit($user->name ?? ($user->prenom.' '.$user->nom), 15) }}
                                </div>
                                <div class="text-xs text-gray-600">{{ $user->contents_count ?? 0 }} contenus</div>
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

<!-- POST MODAL (WITH LANGUAGE DROPDOWN) -->
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
                    <!-- REGION -->
                    <select name="id_region"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">🌍 Région</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->{$region->getKeyName()} }}">{{ $region->nom_region }}</option>
                        @endforeach
                    </select>

                    <!-- LANGUE DROPDOWN -->
                    <select name="id_langue" 
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">🗣️ Langue</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id_langue }}">{{ $langue->nom_langue }}</option>
                        @endforeach
                    </select>

                    <!-- TYPE CONTENU -->
                    <select name="id_type_contenu"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">📝 Type de contenu</option>
                        @foreach($typesContenu as $type)
                            <option value="{{ $type->id_type_contenu }}">{{ $type->nom_contenu }}</option>
                        @endforeach
                    </select>

                    <!-- TYPE MEDIA -->
                    <select name="id_type_media"
                            class="p-4 rounded-lg bg-gray-50 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">🎬 Type de média</option>
                        @foreach($typesMedia as $type)
                            <option value="{{ $type->{$type->getKeyName()} }}">{{ $type->nom_media }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- MEDIA UPLOAD -->
                <div class="p-4 rounded-lg bg-gray-50 border border-gray-300">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-cloud-upload-alt mr-2 text-blue-600"></i>Télécharger des médias
                    </label>
                    <input type="file" name="medias[]" accept="image/*,video/*,audio/*,.pdf" multiple 
                           class="w-full p-2 border border-gray-300 rounded-lg bg-white text-gray-900">
                </div>

                <div class="flex justify-between pt-4 border-t border-gray-300">
                    <button type="button" onclick="closePostModal()"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition duration-300">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-medium transition duration-300 shadow-md">
                        <i class="fas fa-paper-plane mr-2"></i>Publier
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- COMMENT MODAL (WITH STAR RATING) -->
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

                <!-- Star Rating -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-300">
                    <label class="block text-sm text-gray-700 mb-3">Votre évaluation (optionnel)</label>
                    <div class="stars flex flex-row-reverse justify-center gap-2 text-3xl">
                        <input type="radio" name="note" id="star5" value="5"><label for="star5" class="hover:text-amber-500 transition">★</label>
                        <input type="radio" name="note" id="star4" value="4"><label for="star4" class="hover:text-amber-500 transition">★</label>
                        <input type="radio" name="note" id="star3" value="3"><label for="star3" class="hover:text-amber-500 transition">★</label>
                        <input type="radio" name="note" id="star2" value="2"><label for="star2" class="hover:text-amber-500 transition">★</label>
                        <input type="radio" name="note" id="star1" value="1"><label for="star1" class="hover:text-amber-500 transition">★</label>
                    </div>
                </div>

                <div class="flex justify-between pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeCommentModal()"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition duration-300">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-medium transition duration-300">
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
        // Reset stars
        document.querySelectorAll('#commentModal input[type="radio"][name="note"]').forEach(r => r.checked = false);
        // Reset textarea
        document.querySelector('#commentModal textarea[name="texte"]').value = '';
    }

    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePostModal();
            closeCommentModal();
        }
    });

    // Star rating hover effect
    document.querySelectorAll('.stars label').forEach(star => {
        star.addEventListener('mouseover', function() {
            const stars = this.closest('.stars');
            const allStars = stars.querySelectorAll('label');
            const currentIndex = Array.from(allStars).indexOf(this);
            
            allStars.forEach((s, index) => {
                if (index >= currentIndex) {
                    s.style.color = '#f59e0b';
                } else {
                    s.style.color = '#cbd5e1';
                }
            });
        });
    });

    document.querySelectorAll('.stars').forEach(starsContainer => {
        starsContainer.addEventListener('mouseleave', function() {
            const allStars = this.querySelectorAll('label');
            const checked = this.querySelector('input[type="radio"]:checked');
            
            allStars.forEach(star => {
                star.style.color = '#cbd5e1';
            });
            
            if (checked) {
                const checkedIndex = Array.from(this.querySelectorAll('input[type="radio"]')).indexOf(checked);
                const starLabels = this.querySelectorAll('label');
                starLabels.forEach((label, index) => {
                    if (index >= checkedIndex) {
                        label.style.color = '#f59e0b';
                    }
                });
            }
        });
    });
</script>

</body>
</html>