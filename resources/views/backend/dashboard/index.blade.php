@extends('layout')

@section('title')
  <h1 class="mb-0">Tableau de bord - Vue d'ensemble</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Stats Cards Row -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Utilisateurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Contenus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Contenu::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Commentaires</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Commentaire::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Médias</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Media::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-photo-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row of Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Régions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Region::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Langues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Langue::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-language fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Types de contenu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\TypeContenu::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Types de média</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\TypeMedia::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-film fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="row">
        <!-- Quick Actions -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions rapides</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('backend.users.index') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-users mr-2"></i>Gérer les utilisateurs
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('backend.contenus.index') }}" class="btn btn-success btn-block">
                                <i class="fas fa-file-alt mr-2"></i>Voir tous les contenus
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('backend.commentaires.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-comments mr-2"></i>Modérer les commentaires
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('backend.medias.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-photo-video mr-2"></i>Gérer les médias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Activité récente</h6>
                    <span class="badge badge-primary">Aujourd'hui</span>
                </div>
                <div class="card-body">
                    @php
                        $recentContents = \App\Models\Contenu::latest()->take(5)->get();
                    @endphp
                    
                    @if($recentContents->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentContents as $content)
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="small text-gray-500">{{ $content->created_at->diffForHumans() }}</div>
                                        <span class="font-weight-bold">{{ Str::limit($content->titre ?? 'Sans titre', 30) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-3">Aucune activité récente</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- System Info -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informations système</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Environnement :</strong> {{ app()->environment() }}</p>
                    <p><strong>Version Laravel :</strong> {{ app()->version() }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Heure serveur :</strong> {{ now()->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Dernière mise à jour :</strong> Aujourd'hui</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Statut :</strong> <span class="badge badge-success">En ligne</span></p>
                    <p><strong>Rôle :</strong> 
                       @php
                       $userRole = auth()->user()->role;
                       @endphp
    
                       @if($userRole && $userRole->name === 'Administrateur')
                       <span class="badge badge-primary">Administrateur</span>
                       @elseif($userRole && $userRole->name === 'Manageur')
                       <span class="badge badge-success">Manageur</span>
                       @elseif($userRole)
                       <span class="badge badge-secondary">{{ $userRole->name }}</span>
                       @else
                       <span class="badge badge-warning">Non défini</span>
                       @endif
                       </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.icon-circle {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.card {
    border-radius: 0.35rem;
    border: 1px solid #e3e6f0;
}
.border-left-primary { border-left: 0.25rem solid #4e73df !important; }
.border-left-success { border-left: 0.25rem solid #1cc88a !important; }
.border-left-info { border-left: 0.25rem solid #36b9cc !important; }
.border-left-warning { border-left: 0.25rem solid #f6c23e !important; }
.border-left-secondary { border-left: 0.25rem solid #858796 !important; }
.border-left-danger { border-left: 0.25rem solid #e74a3b !important; }
.border-left-dark { border-left: 0.25rem solid #5a5c69 !important; }
</style>
@endsection