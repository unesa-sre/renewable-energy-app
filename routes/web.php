<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ActivityController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;

// --- GUEST ROUTES ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/merch', [ProductController::class, 'publicIndex'])->name('merch');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public Content Routes (Formerly Milestone)
Route::name('milestone.')->group(function () {
    Route::get('/resources', [ResourceController::class, 'index'])->name('resources'); // Static resources (Solar, etc)
    Route::get('/resources/{category}', [ResourceController::class, 'show'])->name('resources.show');

    Route::get('/activity', [ActivityController::class, 'publicListing'])->name('activity');
    Route::get('/activity/{activity}', [ActivityController::class, 'publicShow'])->name('activity.show');
    Route::get('/article', [ArticleController::class, 'publicListing'])->name('article');
    Route::get('/article/{article}', [ArticleController::class, 'publicShow'])->name('article.show');
});


// --- USE CASE: ANGGOTA ---
Route::middleware(['auth', 'verified', 'anggota'])->prefix('member')->name('member.')->group(function () {
    Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/activity', [MemberDashboardController::class, 'activity'])->name('dashboard.activity');
    Route::get('/dashboard/article', [MemberDashboardController::class, 'article'])->name('dashboard.article');
    Route::get('/dashboard/product', [MemberDashboardController::class, 'product'])->name('dashboard.product');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

// --- USE CASE: ADMIN ---
// --- SHARED CONTENT MANAGEMENT ---
// Admin Side
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('article', ArticleController::class);
    Route::resource('activity', ActivityController::class);

    Route::resource('product', ProductController::class);
});

// Member Side (CRUD Access)
Route::middleware(['auth', 'anggota'])->prefix('member')->name('member.')->group(function () {
    Route::resource('article', ArticleController::class);
    Route::resource('activity', ActivityController::class);

    Route::resource('product', ProductController::class);
});

// --- USE CASE: ADMIN ONLY (System & Management) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', AdminUserController::class);
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/{contact_message}', [ContactController::class, 'show'])->name('contact.show');
    Route::delete('contact/{contact_message}', [ContactController::class, 'destroy'])->name('contact.destroy');

});

// Unified Dashboard Redirect
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('member.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profile (Bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';