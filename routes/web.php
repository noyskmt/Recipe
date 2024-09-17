<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheapController;
use App\Http\Controllers\ApiController;


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

// Route::get('/check-auth', function() {
//     if (auth()->check()) {
//         return response()->json(['user' => auth()->user()]);
//     } else {
//         return response()->json(['error' => 'User not authenticated'], 401);
//     }
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/top', [TopController::class, 'index']);
    Route::get('/top/favorite', [TopController::class, 'get_favorite_recipe']);
    Route::get('/top/favorite/recipe/{id}', [TopController::class, 'add_favorire_recipe']);
});

Route::get('/top', [TopController::class, 'index']);
Route::post('/top/food', [TopController::class, 'food']);
Route::get('/top/list', [TopController::class, 'list']);
Route::get('/top/stock_tab/{id}', [TopController::class, 'stock_tab']);
Route::get('/top/serch/recipe', [TopController::class, 'serch_recipe']);
// Route::get('/top/favorite', [TopController::class, 'get_favorite_recipe']);
Route::post('/top/favorite/recipe/{id}', [TopController::class, 'add_favorite_recipe']);
Route::get('/shop', [ShopController::class, 'index']);
Route::post('/shop/store', [ShopController::class, 'store']);
Route::post('/shop/update', [ShopController::class, 'update']);
Route::get('/shop/list', [ShopController::class, 'list']);
Route::get('/shop/remarks', [ShopController::class, 'remarks']);
Route::get('/getData', [ShopController::class, 'getData']);
Route::post('/shop/changeList/{id}', [ShopController::class, 'changeList']);
Route::get('/changeList', [ShopController::class, 'changeList']);
Route::post('/cheap/store', [CheapController::class, 'store']);
Route::post('/cheap/update', [CheapController::class, 'update']);
Route::post('/cheap/destroy/{id}', [CheapController::class, 'destroy']);
Route::get('/cheap/list', [CheapController::class, 'list']);
Route::get('/calendar', function () { return Inertia::render('Calendar'); });

Route::get('/recipeApi', [ApiController::class, 'index']);


// テスト用
// Route::get('/bbb', [BbbController::class, 'index']);
// Route::post('/bbb/store', [BbbController::class, 'store']);



