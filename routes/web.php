<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeSrchController;
// use Illuminate\Foundation\Application;
// use Inertia\Inertia;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/toppage',[RecipeSrchController::class, 'index']);
