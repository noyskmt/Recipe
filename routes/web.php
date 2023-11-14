<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ShopController;

// use App\Http\Controllers\BbbController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/top', [TopController::class, 'index']);
Route::post('/top/food', [TopController::class, 'food']);
Route::get('/top/list', [TopController::class, 'list']);
Route::get('/top/stock_tab/{id}', [TopController::class, 'stock_tab']);
Route::get('/shop', [ShopController::class, 'index']);
Route::post('/shop/store', [ShopController::class, 'store']);
Route::get('/shop/list', [ShopController::class, 'list']);
Route::post('/cheap/store', [cheapController::class, 'store']);
Route::get('/calendar', function () { return Inertia::render('Calendar'); });


// テスト用
// Route::get('/bbb', [BbbController::class, 'index']);
// Route::post('/bbb/store', [BbbController::class, 'store']);


