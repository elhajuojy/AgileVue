<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/users', function (Request $request) {
    $search = $request->input("search");

    return DB::table("users")
        ->where('full_name','like','%'.$search.'%')
        ->orWhere('email','like','%'.$search.'%' )->get();

});


Route::post("/users/invite",[UserController::class,"inviteToProject"])->name("users.invite");



Route::get("/sprints/{sprint}/issues",[SprintController::class, 'issues']);
Route::get("/issue/{issue}/delete",[IssueController::class,"destroy"]);
