<?php


use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/projects', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('projects');

Route::get("/projects/create", [ProjectController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name("projects.create");

Route::get("/projects/{project}", [ProjectController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name("projects.show");

