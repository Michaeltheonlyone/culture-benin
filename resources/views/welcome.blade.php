<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portail Culturel du Bénin | Valoriser le Patrimoine</title>
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
        
        .card-hover {
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        
        /* Hero slider */
        .slide {
            opacity: 0;
            transition: opacity 1s ease;
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .slide.active {
            opacity: 1;
        }
    </style>
</head>
<body class="text-gray-800">

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

        <div class="hidden lg:flex space-x-8">
            <a href="#" class="text-gray-700 hover:text-blue-700 transition duration-300 font-medium">Accueil</a>
            <a href="#" class="text-gray-700 hover:text-blue-700 transition duration-300 font-medium">Collections</a>
            <a href="#" class="text-gray-700 hover:text-blue-700 transition duration-300 font-medium">Régions</a>
            <a href="#" class="text-gray-700 hover:text-blue-700 transition duration-300 font-medium">À propos</a>
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

<!-- Hero Section -->
<div class="hero-gradient text-white">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2">
                <div class="inline-block mb-6 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full">
                    <span class="text-amber-200 font-medium">✦ Plateforme Officielle ✦</span>
                </div>

                <h1 class="text-4xl lg:text-6xl font-bold text-title mb-6 leading-tight">
                    Découvrez le <span class="text-amber-300">Patrimoine Vivant</span> du Bénin
                </h1>

                <p class="text-xl mb-8 text-blue-100 leading-relaxed">
                    Un portail centralisé pour explorer les traditions, les arts, les festivals, 
                    les récits et les archives qui racontent l'histoire et la richesse culturelle du Bénin.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" 
                       class="px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold rounded-xl transition duration-300 shadow-lg text-center">
                        <i class="fas fa-compass mr-2"></i>Explorer les Collections
                    </a>
                    <a href="{{ route('frontend.contenus.feed') }}" 
                       class="px-8 py-4 bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 rounded-xl font-bold transition duration-300 text-center">
                        <i class="fas fa-newspaper mr-2"></i>Voir le Flux
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 relative">
                <!-- Image Slider -->
                <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl">
                    @php
                        $heroImages = [
                            'welcome.avif',
                            'welcome1.jpg',
                            'welcome2.jpg',
                            'welcome3.jpg',
                            'welcome4.jpg',
                            'welcome5.jpg',
                            'welcome6.jpg',
                        ];
                    @endphp
                    
                    @foreach($heroImages as $index => $img)
                        <div class="slide {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('assets/images/' . $img) }}" 
                                 alt="Patrimoine béninois {{ $index + 1 }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    @endforeach
                    
                    <!-- Slider Controls -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                        @foreach($heroImages as $index => $img)
                            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition {{ $index === 0 ? 'bg-white' : '' }}" 
                                    data-index="{{ $index }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Types de Contenu -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-4xl font-bold text-title mb-4">Que voulez vous<span class="text-blue-700"> Voir ?</span></h2>
        <p class="text-gray-600 max-w-3xl mx-auto">Découvrez la diversité des expressions culturelles béninoises</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($typecontenus as $type)
            @php
                $images = [
                    'Chant'    => 'chanson.png',   
                    'Dance'    => 'danse.jpg',    
                    'Theatre'  => 'theatre.jpg',   
                    'Conte'    => 'conte.jpg',
                    'Repas'    => 'repas.jpg',
                ];
                $colors = [
                    'Chant'    => ['from-blue-500', 'to-blue-600'],
                    'Dance'    => ['from-purple-500', 'to-purple-600'],
                    'Theatre'  => ['from-amber-500', 'to-amber-600'],
                    'Conte'    => ['from-emerald-500', 'to-emerald-600'],
                    'Repas'    => ['from-red-500', 'to-red-600'],
                ];
                $image = $images[$type->nom_contenu] ?? 'default.jpg';
                $colorClasses = $colors[$type->nom_contenu] ?? ['from-gray-500', 'to-gray-600'];
            @endphp

            <div class="bg-white rounded-2xl overflow-hidden border border-gray-200 card-hover">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('assets/typecontenus/' . $image) }}"
                         alt="{{ $type->nom_contenu }}"
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $type->nom_contenu }}</h3>
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-r {{ $colorClasses[0] }} {{ $colorClasses[1] }} flex items-center justify-center text-white">
                            <i class="fas fa-music"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        {{ $type->description ?? "Découvrez ce contenu et son importance culturelle." }}
                    </p>
                    <a href="{{ route('contenus.type', ['id' => $type->id_type_contenu]) }}" 
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
                        Explorer <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Régions -->
<section class="bg-gradient-to-r from-blue-50 to-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-title mb-4">Explorer par <span class="text-blue-700">Région</span></h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Découvrez la richesse culturelle à travers les régions du Bénin</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $regionImages = [
                    'Dassa'      => 'nord.jpg',
                    'Mono'       => 'sud.jpg',
                    'Ouidah'     => 'est.jpg',
                    'Litoral'    => 'ouest.jpg',
                    'Atlantique' => 'centre.jpg',
                    'Abomey'     => 'Abomey.jpg',
                ];
            @endphp

            @foreach($regions as $region)
                @php
                    $image = $regionImages[$region->nom_region] ?? 'default.jpg';
                @endphp

                <a href="{{ route('frontend.region', ['id' => $region->id_region]) }}"
                   class="group bg-white rounded-2xl overflow-hidden border border-gray-200 card-hover">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('assets/regions/' . $image) }}"
                             alt="{{ $region->nom_region }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-2xl font-bold text-white">{{ $region->nom_region }}</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            {{ $region->description ?? "Découvrez cette région et sa richesse culturelle." }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 font-semibold group-hover:text-blue-800">
                                Explorer la région
                            </span>
                            <i class="fas fa-arrow-right text-blue-500 group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 lg:p-12 text-white">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-2/3">
                <h3 class="text-2xl lg:text-3xl font-bold mb-4">Restez informé</h3>
                <p class="text-blue-100 mb-6">
                    Inscrivez-vous à notre newsletter pour recevoir les dernières actualités culturelles,
                    les nouveaux contenus ajoutés et les événements à venir.
                </p>
            </div>
            <div class="lg:w-1/3 w-full">
                <form method="POST" action="#" class="flex flex-col sm:flex-row gap-3">
                    @csrf
                    <input type="email" 
                           name="email" 
                           placeholder="Votre adresse email" 
                           class="flex-1 px-4 py-3 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 rounded-lg font-bold shadow-lg transition duration-300">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
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
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                    <li><a href="{{ route('frontend.contenus.feed') }}" class="text-gray-400 hover:text-white transition">Flux culturel</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Collections</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Régions</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-bold text-lg mb-4">Ressources</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Guide du contributeur</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Politique de confidentialité</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Conditions d'utilisation</a></li>
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
                    <div class="flex gap-4 mt-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-600 flex items-center justify-center transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-400 flex items-center justify-center transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-pink-600 flex items-center justify-center transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} Portail Culturel du Bénin. Tous droits réservés.</p>
            <p class="mt-2">Valoriser, préserver et partager le patrimoine culturel béninois.</p>
        </div>
    </div>
</footer>

<script>
    // Image Slider
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');
        let currentSlide = 0;
        
        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('bg-white'));
            
            slides[index].classList.add('active');
            dots[index].classList.add('bg-white');
            currentSlide = index;
        }
        
        // Auto-slide
        setInterval(() => {
            let nextSlide = (currentSlide + 1) % slides.length;
            showSlide(nextSlide);
        }, 4000);
        
        // Dot click events
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });
        
        // Card hover effects
        const cards = document.querySelectorAll('.card-hover');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

</body>
</html>