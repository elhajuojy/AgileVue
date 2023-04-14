<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;


//issue comments
Route::post("/api/issues/add-comment",[IssueController::class,"addComment"])->name("addComment");
Route::get("/api/issues/{issue}/comments",[IssueController::class,"issueComments"])->name("issueComments");
Route::delete("/api/issues/{issue}/comments/{comment}",[IssueController::class,"deleteComment"])->name("deleteComment");
///api/issues/remove-comment/
Route::delete("/api/issues/remove-comment/{comment}",[IssueController::class,"deleteComment"])->name("deleteComment");

//http://127.0.0.1:8000/api/issues/assigne-issue
Route::patch("/api/issues/assign-issue" , [IssueController::class,"assignIssue"])->name("assignIssue");

Route::delete("/api/issues/{issue}/delete",[IssueController::class,"destroy"])->name("deleteIssue");
Route::get("/api/issues/{issue}/edit",[IssueController::class,"edit"])->name("editIssue");
Route::patch("/api/issues/{issue}/update",[IssueController::class,"update"])->name("updateIssue");
Route::post("/api/issues/{project}/create",[IssueController::class,"store"])->name("createIssue");
Route::get("/api/issues/{issue}/show",[IssueController::class,"show"])->name("showIssue");
