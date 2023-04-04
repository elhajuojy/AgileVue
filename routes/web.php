<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProjectController;
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
        "cover" => asset('storage/Home/cover.png'),
        "main_image"=> asset('storage/Home/main_image.png'),
    ]);
});

Route::get('/inbox', function () {
    return Inertia::render('Inbox');
});

Route::get('/dashboard', function () {




    return Inertia::render('Dashboard',[
        "sharedProjects"=>auth()->user()->projects


    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );

    Route::get('/search/users/board',[UserController::class,"find"])->name("users.all");

    require __DIR__ . '/project.php';
    require __DIR__ . '/sprint.php';


});

require __DIR__ . '/auth.php';
