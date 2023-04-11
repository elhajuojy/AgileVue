<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

// /api/issues/add-comment



Route::post("/api/issues/add-comment",[IssueController::class,"addComment"])->name("addComment");
