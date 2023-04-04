<?php


use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SprintController;
use Illuminate\Support\Facades\Route;




Route::post("/sprint", [SprintController::class, 'store'])
    ->name("sprint.store");

