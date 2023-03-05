<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get("/users",function(){
    sleep(2);
    return Inertia::render("Users");
});

Route::get("/settings",function(){
    return Inertia::render("Settings");
});

Route::post("/logout",function(){
    dd(request("userid"));
});

