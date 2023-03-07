<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    //
    public function create()
    {
       return Inertia::render("Auth/Login");
    }
}
