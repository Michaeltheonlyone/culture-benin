<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContenusController;
use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\PaymentController; // Add this line
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\RoleController;

// --------------------
// Public routes - GUESTS CAN ACCESS THESE
// --------------------

// Welcome page
Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');

// Public search (must be before /contenus/{id})
Route::get('/contenus/search', [FrontendController::class, 'search'])->name('contenus.search');

// Public filter routes
Route::get('/contenus/type/{id}', [FrontendController::class, 'showByType'])->name('contenus.type');
Route::get('/contenus/region/{id}', [FrontendController::class, 'showByRegion'])->name('contenus.region');
Route::get('/region/{id}', [FrontendController::class, 'showByRegion'])->name('frontend.region');

// Public profile view (must be before /profile/edit)
Route::get('/profile/{id}', [ProfileController::class, 'showPublic'])
    ->where('id', '[0-9]+') // Only match numeric IDs
    ->name('frontend.profile.show');

// Public content view (must be before /feed if you have conflicts)
Route::get('/contenus/{id}', [FrontendController::class, 'showFront'])
    ->where('id', '[0-9]+') // Only match numeric IDs
    ->name('contenus.show');

// Public feed (last among public content routes)
Route::get('/feed', [FrontendController::class, 'home'])->name('frontend.contenus.feed');

// --------------------
// Auth routes (login/register) - BUILT-IN LARAVEL
// --------------------
require __DIR__.'/auth.php';

// --------------------
// Authenticated user actions - REQUIRES LOGIN
// --------------------
Route::middleware(['auth'])->group(function () {
    // Profile management - SPECIFIC ROUTES BEFORE PARAMETERIZED
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('frontend.profile'); // User's own profile
    
    // Posting & commenting actions
    Route::post('/frontend/posts', [ContenusController::class, 'store'])->name('contenus.store');
    Route::post('/frontend/comments', [CommentairesController::class, 'storeFront'])->name('commentaires.store');
    Route::post('/tweet', [ContenusController::class, 'storeFront'])->name('contenus.storeFront');
    
    // ========== PAYMENT ROUTES ==========
    // Payment initiation (user clicks "Payer" button)
    Route::get('/payment/initiate/{contentId}', [PaymentController::class, 'initiatePayment'])
        ->name('payment.initiate');
});

// --------------------
// Payment callback route - PUBLIC (FedaPay redirects here)
// --------------------
Route::get('/payment/callback/{contentId?}', [PaymentController::class, 'paymentCallback'])
    ->name('payment.callback');

// --------------------
// Backend (Admins / Managers only) - REQUIRES ADMIN ROLE
// --------------------
// ======================
// BLOCK 1: Both Admin & Manager can access
// ======================
Route::middleware(['auth', 'role:Administrateur,Manageur'])
    ->prefix('backend')
    ->name('backend.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('users', UsersController::class);
        Route::resource('contenus', ContenusController::class);
        Route::resource('commentaires', CommentairesController::class);
        Route::resource('medias', MediaController::class);
        Route::resource('region', RegionController::class);
    });

// ======================
// BLOCK 2: Admin ONLY (Manager gets logged out!)
// ======================
Route::middleware(['auth', 'role:Administrateur'])
    ->prefix('backend')
    ->name('backend.')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('langues', LanguesController::class);
        Route::resource('typecontenus', TypeContenuController::class);
        Route::resource('typemedias', TypeMediaController::class);
    });
Route::get('/contenu/{id}/pay', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::get('/payment/callback/{contentId?}', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/check-cloudinary-config', function() {
    echo "<pre>";
    echo "Config check:\n";
    echo "cloud_name: " . config('cloudinary.cloud_name') . "\n";
    echo "api_key: " . config('cloudinary.api_key') . "\n";
    echo "api_secret: " . (config('cloudinary.api_secret') ? 'SET' : 'NOT SET') . "\n";
    
    // Check if Cloudinary facade works
    try {
        $cloudinary = app('cloudinary');
        echo "\nCloudinary facade: OK\n";
    } catch (\Exception $e) {
        echo "\nCloudinary facade error: " . $e->getMessage() . "\n";
    }
    echo "</pre>";
});