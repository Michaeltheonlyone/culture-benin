<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription | Portail Culturel du Bénin</title>
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
        
        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
        }
        
        .card-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        .card-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .form-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100">

<!-- Navigation -->
<nav class="sticky top-0 z-50 py-4 px-6 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center shadow">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-amber-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-title text-gray-900">Portail Culturel <span class="text-blue-700">du Bénin</span></h1>
                <p class="text-sm text-gray-600">Valoriser le patrimoine</p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 text-blue-700 hover:text-blue-800 transition duration-300 text-sm font-medium">
                Connexion
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm font-medium">
                Inscription
            </a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-4xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Introduction -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-8 lg:p-10 text-white shadow-2xl">
                    <div class="inline-block mb-6 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full">
                        <span class="text-amber-200 font-medium">✦ Rejoignez-nous ✦</span>
                    </div>

                    <h2 class="text-3xl lg:text-4xl font-bold text-title mb-6 leading-tight">
                        Devenez un <span class="text-amber-300">Gardien du Patrimoine</span>
                    </h2>

                    <p class="text-lg mb-8 text-blue-100 leading-relaxed">
                        En vous inscrivant, vous rejoignez une communauté dédiée à la préservation 
                        et au partage de la richesse culturelle béninoise.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-share-alt text-amber-300"></i>
                            </div>
                            <span>Partagez des contenus culturels</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-comments text-amber-300"></i>
                            </div>
                            <span>Interagissez avec la communauté</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-heart text-amber-300"></i>
                            </div>
                            <span>Évaluez et commentez les contenus</span>
                        </div>
                    </div>

                    <!-- Preview Image -->
                    <div class="mt-8 rounded-xl overflow-hidden border border-white/20">
                        <img src="{{ asset('assets/images/welcome1.jpg') }}" 
                             alt="Communauté culturelle" 
                             class="w-full h-48 object-cover">
                    </div>
                </div>
            </div>

            <!-- Right Column - Registration Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-8 shadow-2xl border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Créer un compte</h3>
                    <p class="text-gray-600 mb-6">Rejoignez notre communauté culturelle</p>

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded mb-6">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-red-700 font-medium">Veuillez corriger les erreurs suivantes :</p>
                                    <ul class="mt-2 text-red-600 text-sm list-disc list-inside">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <!-- Name Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Prénom *</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="prenom" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Votre prénom" 
                                           required
                                           value="{{ old('prenom') }}">
                                    <i class="fas fa-user absolute right-3 top-3.5 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="nom" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Votre nom" 
                                           required
                                           value="{{ old('nom') }}">
                                    <i class="fas fa-user absolute right-3 top-3.5 text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Email & Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <div class="relative">
                                <input type="email" 
                                       name="email" 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="email@exemple.com" 
                                       required
                                       value="{{ old('email') }}">
                                <i class="fas fa-envelope absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe *</label>
                                <div class="relative">
                                    <input type="password" 
                                           name="password" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="••••••••" 
                                           required>
                                    <i class="fas fa-lock absolute right-3 top-3.5 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmation *</label>
                                <div class="relative">
                                    <input type="password" 
                                           name="password_confirmation" 
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="••••••••" 
                                           required>
                                    <i class="fas fa-lock absolute right-3 top-3.5 text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sexe *</label>
                                <select name="sexe" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required>
                                    <option value="">Sélectionnez</option>
                                    <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date de naissance *</label>
                                <input type="date" 
                                       name="date_naissance" 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       required
                                       value="{{ old('date_naissance') }}">
                            </div>
                        </div>

                        <!-- Language -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Langue préférée *</label>
                            <select name="id_langue" 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                    required>
                                <option value="">Sélectionnez une langue</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id_langue }}" {{ old('id_langue') == $langue->id_langue ? 'selected' : '' }}>
                                        {{ $langue->nom_langue }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- File Uploads -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil (optionnel)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                            <p class="text-sm text-gray-500">Cliquez pour télécharger</p>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF (max 2MB)</p>
                                        </div>
                                        <input type="file" name="photo" accept="image/*" class="hidden">
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image d'en-tête (optionnel)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-image text-2xl text-gray-400 mb-2"></i>
                                            <p class="text-sm text-gray-500">Image de couverture</p>
                                            <p class="text-xs text-gray-500">Recommandé: 1500×500px</p>
                                        </div>
                                        <input type="file" name="header" accept="image/*" class="hidden">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 rounded-xl transition duration-300 shadow-lg flex items-center justify-center gap-2">
                            <i class="fas fa-user-plus"></i> Créer mon compte
                        </button>

                        <!-- Login Link -->
                        <p class="text-center text-gray-600 text-sm">
                            Vous avez déjà un compte ? 
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                Connectez-vous ici
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-landmark text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">Portail Culturel du Bénin</h4>
                        <p class="text-sm text-gray-400">Valoriser le patrimoine</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">
                    Plateforme officielle de préservation et de promotion du patrimoine culturel béninois.
                </p>
            </div>

            <div>
                <h5 class="font-bold text-lg mb-4">Navigation</h5>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                    <li><a href="{{ route('frontend.contenus.feed') }}" class="text-gray-400 hover:text-white transition">Flux culturel</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Collections</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-bold text-lg mb-4">Ressources</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Guide du contributeur</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-bold text-lg mb-4">Contact</h5>
                <div class="space-y-3">
                    <div class="flex items-center text-gray-400">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>contact@culturebenin.bj</span>
                    </div>
                    <div class="flex items-center text-gray-400">
                        <i class="fas fa-phone mr-3"></i>
                        <span>+229 XX XX XX XX</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} Portail Culturel du Bénin. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script>
    // File upload preview
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const label = this.parentElement;
                const fileName = this.files[0]?.name || 'Aucun fichier sélectionné';
                
                // Update label text
                const textElement = label.querySelector('p');
                if (textElement) {
                    textElement.textContent = fileName;
                }
            });
        });
    });
</script>

</body>
</html>