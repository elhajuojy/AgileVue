<?php


use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/projects', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('projects');

Route::post("/projects", [ProjectController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name("projects.store");

Route::get("/projects/create", [ProjectController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name("projects.create");



Route::get("/projects/{project}", [ProjectController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name("projects.show");

Route::get("/projects/{project}/board", [ProjectController::class, 'board'])
    ->middleware(['auth', 'verified'])
    ->name("projects.edit");


Route::get("/projects/{project}/backlog", [ProjectController::class, 'backlog'])
    ->middleware(['auth', 'verified'])
    ->name("projects.backlog");


