<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('projects/board', [
            "users"=>User::all(),

        ]);
    }


}
