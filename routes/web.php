<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render("Home",[
        "name"=>"Elmahdi elhjuojy",
        "hobbies"=>[
            "Programming",
            "Reading",
            "Writing",
            "Watching movies"
        ]
    ]);
});

Route::get("/login",[LoginController::class,"create"])->name("login");

Route::middleware("auth")->group(function(){

Route::get("/users",function(){
    // sleep(1);
    return Inertia::render("Users",[
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('full_name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'full_name' => $user->full_name
            ]),

        'filters' => Request::only(['search'])
    ]);
});

Route::get("/settings",function(){
    return Inertia::render("Settings");
});

Route::post("/logout",function(){
    dd(request("userid"));
});



});

