<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Register;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Register');
    }

    public function store(Request $request)
    {

    }
}
