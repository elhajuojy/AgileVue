<?php


use App\Http\Controllers\BacklogController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get("/api/issues/{project}/backlog",[BacklogController::class,"issues"])->name("issues");



///api/issues/${e.added.element.id}/backlog

Route::post("/api/issues/{issue}/backlog",[BacklogController::class,"updateIssueBacklog"])->name("updateIssueBacklog");
