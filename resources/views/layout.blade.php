
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>@yield('page_title', 'Admin - App Culture')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

    {{-- Styles principaux (AdminLTE / plugins). Remplacer par vos assets compilés si besoin --}}
    <link rel="preload" href="{{ asset('assets/css/adminlte.css') }}" as="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print" onload="this.media='all'"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"/>

    @stack('head')
  </head>
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    @php $utilisateur = Auth::user(); @endphp

    <div class="app-wrapper">
      {{-- Header minimal --}}
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('backend.dashboard.index') }}">Culture — Backoffice</a>
          <div class="ms-auto">
            @if($utilisateur)
              <span class="me-3 small text-muted">Bonjour, {{ $utilisateur->prenom ?? $utilisateur->name ?? 'Utilisateur' }}</span>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-outline-danger">Déconnexion</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            @endif
          </div>
        </div>
      </nav>

      {{-- Sidebar --}}
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="{{ route('backend.dashboard.index') }}" class="brand-link"><span class="brand-text fw-light">Culture</span></a>
        </div>

        <div class="sidebar-wrapper">
          <nav class="mt-2">
           <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation">
    <li class="nav-item">
        <a href="{{ route('backend.dashboard.index') }}" class="nav-link {{ request()->routeIs('backend.dashboard.*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-speedometer"></i><p>Dashboard</p>
        </a>
    </li>

    <li class="nav-header">Menu</li>

    {{-- Both Admin & Manager can see these --}}
    <li class="nav-item"><a href="{{ route('backend.users.index') }}" class="nav-link {{ request()->routeIs('backend.users.*') ? 'active' : '' }}"><i class="nav-icon bi bi-people-fill"></i><p>Utilisateurs</p></a></li>
    <li class="nav-item"><a href="{{ route('backend.region.index') }}" class="nav-link {{ request()->routeIs('backend.region.*') ? 'active' : '' }}"><i class="nav-icon bi bi-geo-alt-fill"></i><p>Régions</p></a></li>
    <li class="nav-item"><a href="{{ route('backend.contenus.index') }}" class="nav-link {{ request()->routeIs('backend.contenus.*') ? 'active' : '' }}"><i class="nav-icon bi bi-file-text-fill"></i><p>Contenus</p></a></li>
    <li class="nav-item"><a href="{{ route('backend.commentaires.index') }}" class="nav-link {{ request()->routeIs('backend.commentaires.*') ? 'active' : '' }}"><i class="nav-icon bi bi-chat-left-text-fill"></i><p>Commentaires</p></a></li>
    <li class="nav-item">
        <a href="{{ route('backend.medias.index') }}" class="nav-link {{ request()->routeIs('backend.medias.*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-image-fill"></i><p>Médias</p>
        </a>
    </li>

    {{-- ADMIN ONLY MENU ITEMS --}}
    @if(auth()->user()->role->name === 'Administrateur')
        <li class="nav-header">Configuration système</li>
        <li class="nav-item"><a href="{{ route('backend.roles.index') }}" class="nav-link {{ request()->routeIs('backend.roles.*') ? 'active' : '' }}"><i class="nav-icon bi bi-shield-lock-fill"></i><p>Rôles</p></a></li>
        <li class="nav-item"><a href="{{ route('backend.langues.index') }}" class="nav-link {{ request()->routeIs('backend.langues.*') ? 'active' : '' }}"><i class="nav-icon bi bi-chat-dots-fill"></i><p>Langues</p></a></li>
        <li class="nav-item">
            <a href="{{ route('backend.typemedias.index') }}" class="nav-link {{ request()->routeIs('backend.typemedias.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-tags-fill"></i><p>Types médias</p>
            </a>
        </li>
        {{-- If you have TypeContenuController --}}
        {{-- <li class="nav-item">
            <a href="{{ route('backend.typecontenus.index') }}" class="nav-link {{ request()->routeIs('backend.typecontenus.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-tags-fill"></i><p>Types contenu</p>
            </a>
        </li> --}}
    @endif

    <li class="nav-item"><a href="{{ route('frontend.contenus.feed') }}" class="nav-link"><i class="nav-icon bi bi-arrow-left-circle-fill"></i><p>Retour au Flux</p></a></li>
</ul>
          </nav>
        </div>
      </aside>

      {{-- Main content --}}
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            @yield('title')
          </div>
        </div>

        <div class="app-content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </main>

      {{-- Footer --}}
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <strong>Copyright &copy; 2014-2025 <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>

    <script>
      // Initialisation des overlayscrollbars pour la sidebar
      document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.querySelector('.sidebar-wrapper');
        if (wrapper && window.OverlayScrollbars) {
          OverlayScrollbars(wrapper, { scrollbars: { theme: 'os-theme-light', autoHide: 'leave' }});
        }
      });
    </script>

    @stack('scripts')
  </body>
</html>