<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BioController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use  App\Http\Controllers\Admin\MessageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bio', [BioController::class, 'index'])->name('bio');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// ADMIN ROUTES
Route::get('/admin/login', [DashboardController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'login'])->name('admin.login.submit');

Route::middleware('auth')->group(function () {
    Route::get('/admin/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::post('/admin/posts/{id}/edit', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{id}', [MessageController::class, 'show'])->name('admin.messages.show');
    Route::post('/admin/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('admin.messages.read');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
});
