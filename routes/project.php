<?php


use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;



Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::delete("/projects/{project}",[ProjectController::class,"depstroy"])->name("projects.destroy");
Route::patch("/projects/{project}",[ProjectController::class,"update"])->name("projects.update");


Route::post("/projects", [ProjectController::class, 'store'])->name("projects.store");

Route::get("/projects/create", [ProjectController::class, 'create'])
    ->name("projects.create");
Route::get("/projects/{project}/edit", [ProjectController::class, 'edit'])
    ->name("projects.edit");



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




Route::delete("/api/user_project/remove",[UserProjectController::class,"destroy"]);


Route::get("/projects/{project}/versions", [VersionController::class, 'versions'])->name("projects.versions");
Route::post("/projects/{project}/versions", [VersionController::class, 'store'])->name("projects.versions");


