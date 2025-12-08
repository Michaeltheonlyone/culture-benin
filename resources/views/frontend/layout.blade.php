<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portail Culturel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --royal-red: #8B0000;
            --royal-gold: #D4A017;
            --royal-gray: #1f1f1f;
        }
        select option { background-color: #1f1f1f; color: #ffffff; }
        .stars label { cursor: pointer; font-size: 1.6rem; color: #4b5563; transition: color .15s ease; }
        .stars input[type="radio"] { display: none; }
        .stars label:hover, .stars label:hover ~ label { color: #facc15; }
        .stars input:checked ~ label { color: #facc15; }
        .modal { position: fixed; inset: 0; display: none; background: rgba(0,0,0,.7); z-index: 50; align-items: center; justify-content: center; }
        .modal.open { display: flex; }
    </style>
</head>
<body class="bg-[var(--royal-gray)] text-white">

<div class="w-full min-h-screen flex justify-center">

    <!-- LEFT PANEL -->
    <aside class="hidden md:flex flex-col w-64 p-6 border-r border-gray-700 sticky top-0 h-screen">
        <div class="flex items-center gap-3 mb-10">
            <a href="{{ route('frontend.contenus.feed') }}" class="flex items-center gap-3 hover:opacity-80">
                <img src="{{ asset('assets/icons/your-logo.png') }}" alt="Logo" class="w-12 h-12 rounded-lg">
                <div class="font-semibold leading-tight">
                    Portail Culturel <br> du Bénin
                </div>
            </a>
        </div>

        <a href="{{ route('frontend.profile') }}" class="mb-4 bg-gray-700 hover:bg-gray-600 transition px-4 py-3 rounded-lg font-bold text-center w-full block">
            Mon profil
        </a>

        <button onclick="openPostModal()" class="mb-4 bg-[var(--royal-red)] hover:bg-red-700 transition px-4 py-3 rounded-lg font-bold text-center w-full">
            Poster
        </button>

        @auth
            @if(Auth::user()->role && in_array(Auth::user()->role->name, ['Administrateur','Manageur']))
                <a href="{{ route('backend.dashboard.index') }}" class="mb-4 bg-gray-700 hover:bg-gray-600 transition px-4 py-3 rounded-lg font-bold text-center w-full block">
                    Tableau de bord (Admin)
                </a>
            @endif
        @endauth

        @auth
            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button class="bg-gray-700 hover:bg-gray-600 transition px-4 py-3 rounded-lg font-bold text-center w-full">
                    Déconnexion
                </button>
            </form>
        @endauth
    </aside>

    <!-- CENTER FEED (dynamic only) -->
    <main class="w-full md:w-[600px] border-x border-gray-700 min-h-screen">
        @yield('content')
    </main>

    <!-- RIGHT PANEL -->
    <aside class="hidden lg:flex flex-col w-72 p-6 sticky top-0 h-screen">
        <form action="{{ route('contenus.search') }}" method="GET" class="w-full mb-4">
            <input type="text" name="q" placeholder="Rechercher…"
                   class="w-full p-3 rounded-xl bg-gray-800 text-white border border-gray-600 placeholder-gray-400">
        </form>

        <div class="bg-gray-900 border border-gray-700 rounded-xl p-3">
            <div class="font-semibold mb-2">Découvrir</div>
            {{-- static layout, data filled in feed view --}}
        </div>

        <div class="bg-gray-900 border border-gray-700 rounded-xl p-3 mt-4">
            <div class="font-semibold mb-2">Meilleurs Profils</div>
            {{-- static layout, data filled in feed view --}}
        </div>
    </aside>
</div>

<!-- POST MODAL -->
<div id="postModal" class="modal">
    <div class="bg-[var(--royal-gray)] text-white rounded-xl w-full max-w-lg p-6 shadow-lg">
        {{-- static layout, form filled in feed view --}}
    </div>
</div>

<!-- COMMENT MODAL -->
<div id="commentModal" class="modal">
    <div class="bg-[var(--royal-gray)] text-white rounded-xl w-full max-w-lg p-6 shadow-lg">
        {{-- static layout, form filled in feed view --}}
    </div>
</div>

<script>
    function openPostModal() { document.getElementById('postModal').classList.add('open'); }
    function closePostModal() { document.getElementById('postModal').classList.remove('open'); }
    function openCommentModal(contenuId) {
        document.getElementById('comment_contenu_id').value = contenuId;
        document.getElementById('commentModal').classList.add('open');
    }
    function closeCommentModal() {
        document.getElementById('commentModal').classList.remove('open');
        document.querySelectorAll('#commentModal input[type="radio"][name="note"]').forEach(r => r.checked = false);
        document.querySelector('#commentModal textarea[name="texte"]').value = '';
    }
</script>

</body>
</html>