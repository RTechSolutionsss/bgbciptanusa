<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlSalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserSalesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return view('auth.login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    'auth','admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/cekregist', function () {
        return Inertia::render('CheckRegist');
    })->name('cekregist');

    Route::get('usersales-edit', [UserSalesController::class, 'Edit'])->name('usersales.edit');
    Route::resource('logactivity', LogActivityController::class);
    Route::resource('katalog', KatalogController::class);
    Route::resource('user', UserController::class);
    Route::resource('url-sales', UrlSalesController::class);
});

Auth::routes();
Route::resource('customer', CustomerController::class);

Route::middleware([
    'auth:sanctum',
    'auth','admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'sales'])->name('home');
    Route::get('/cekregist', function () {
        return Inertia::render('CheckRegist');
    })->name('cekregist');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
