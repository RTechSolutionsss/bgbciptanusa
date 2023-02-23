<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrackingUrlTasksController;
use App\Http\Controllers\UrlSalesController;
use App\Http\Controllers\ProfileController;
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

    Route::get('usersales-edit', [UserSalesController::class, 'Edit'])->name('usersales.edit');
    Route::get('usersales', [UserSalesController::class, 'index'])->name('usersales.index');
    Route::get('katalog-edit', [KatalogController::class, 'editing'])->name('katalog.editing');
    Route::get('task/{id}', [TrackingUrlTasksController::class, 'task'])->name('task');
    Route::get('taskcustomer/{id}', [TrackingUrlTasksController::class, 'taskcustomer'])->name('taskcustomer');
    Route::post('taskupdate', [TrackingUrlTasksController::class, 'update'])->name('updatetracking');
    Route::resource('logactivity', LogActivityController::class);
    Route::resource('katalog', KatalogController::class);
    Route::resource('user', UserController::class);
    Route::resource('url-sales', UrlSalesController::class);
    Route::resource('product', ProductController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('profile', ProfileController::class);
});

Auth::routes();
Route::resource('customer', CustomerController::class);

Route::middleware([
    'auth:sanctum',
    'auth','admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/cekregist', function () {
        return Inertia::render('CheckRegist');
    })->name('cekregist');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
