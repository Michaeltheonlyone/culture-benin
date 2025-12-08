<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion | Portail Culturel du Bénin</title>
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
        
        .form-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }
        
        .remember-me:checked {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
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
            <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-full shadow transition duration-300 text-sm font-medium">
                Connexion
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-blue-700 hover:text-blue-800 transition duration-300 text-sm font-medium">
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
                        <span class="text-amber-200 font-medium">✦ Bienvenue de retour ✦</span>
                    </div>

                    <h2 class="text-3xl lg:text-4xl font-bold text-title mb-6 leading-tight">
                        Retrouvez <span class="text-amber-300">Votre Communauté</span>
                    </h2>

                    <p class="text-lg mb-8 text-blue-100 leading-relaxed">
                        Accédez à votre espace personnel, continuez à explorer et partager 
                        la richesse culturelle béninoise avec notre communauté.
                    </p>

                    <!-- Testimonials / Features -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Communauté active</h4>
                                <p class="text-blue-100 text-sm">Rejoignez des milliers de passionnés du patrimoine</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-emerald-500 to-green-500 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-share-square text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Partagez vos découvertes</h4>
                                <p class="text-blue-100 text-sm">Publiez et découvrez du contenu culturel unique</p>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Image -->
                    <div class="mt-8 rounded-xl overflow-hidden border border-white/20">
                        <img src="{{ asset('assets/images/welcome2.jpg') }}" 
                             alt="Communauté culturelle" 
                             class="w-full h-48 object-cover">
                    </div>
                </div>
            </div>

            <!-- Right Column - Login Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-8 shadow-2xl border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Connexion</h3>
                    <p class="text-gray-600 mb-6">Accédez à votre compte</p>

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded mb-6">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-red-700 font-medium">Échec de la connexion</p>
                                    <p class="mt-1 text-red-600 text-sm">
                                        Les identifiants ne correspondent pas à nos enregistrements.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse email *</label>
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

                        <!-- Password -->
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
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="remember" 
                                   id="remember"
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 remember-me">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 rounded-xl transition duration-300 shadow-lg flex items-center justify-center gap-2">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Ou continuez avec</span>
                            </div>
                        </div>

                        <!-- Social Login (Optional) -->
                        <div class="grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-300">
                                <i class="fab fa-google text-red-500"></i>
                                <span class="text-sm font-medium">Google</span>
                            </a>
                            <a href="#" class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-300">
                                <i class="fab fa-facebook text-blue-600"></i>
                                <span class="text-sm font-medium">Facebook</span>
                            </a>
                        </div>

                        <!-- Register Link -->
                        <p class="text-center text-gray-600 text-sm">
                            Pas encore de compte ? 
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                S'inscrire gratuitement
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

</body>
</html>