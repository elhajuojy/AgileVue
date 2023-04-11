<?php


use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SprintController;
use Illuminate\Support\Facades\Route;




Route::post("/sprint", [SprintController::class, 'store'])
    ->name("sprint.store");




Route::get("/sprint/{project}/delete/{sprint}", [SprintController::class, 'destroy'])
    ->name("sprint.destroy");




//"/api/sprints/" + props.sprint.id + "/issues/" + event.added.element.id


Route::post("api/sprints/{sprint}/issues/{issue}", [SprintController::class, 'updateIssueSprint'])
    ->name("sprint.updateIssueSprint");
