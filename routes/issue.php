<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;


//issue comments
Route::post("/api/issues/add-comment",[IssueController::class,"addComment"])->name("addComment");
Route::get("/api/issues/{issue}/comments",[IssueController::class,"issueComments"])->name("issueComments");
Route::delete("/api/issues/{issue}/comments/{comment}",[IssueController::class,"deleteComment"])->name("deleteComment");


Route::delete("/api/issues/{issue}/delete",[IssueController::class,"destroy"])->name("deleteIssue");
Route::get("/api/issues/{issue}/edit",[IssueController::class,"edit"])->name("editIssue");
Route::patch("/api/issues/{issue}/update",[IssueController::class,"update"])->name("updateIssue");
Route::post("/api/issues/{project}/create",[IssueController::class,"store"])->name("createIssue");
Route::get("/api/issues/{issue}/show",[IssueController::class,"show"])->name("showIssue");
