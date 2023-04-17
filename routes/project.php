<?php


use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/projects', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('projects');

Route::post("/projects", [ProjectController::class, 'store'])
    ->name("projects.store");

Route::get("/projects/create", [ProjectController::class, 'create'])
    ->name("projects.create");



Route::get("/projects/{project}", [ProjectController::class, 'show'])
    ->name("projects.show");

Route::get("/projects/{project}/board", [ProjectController::class, 'board'])
    ->name("projects.edit");


Route::get("/projects/{project}/backlog", [ProjectController::class, 'backlog'])
    ->name("projects.backlog");

Route::post("/projects/{project}/decline-invitation", [ProjectController::class, 'declineInvitation'])
    ->name("projects.decline-invitation");

Route::post("/projects/{project}/accept-invitation", [ProjectController::class, 'acceptInvitation'])
    ->name("projects.accept-invitation");


Route::delete("/projects/{project}",[ProjectController::class,"destroy"]);

