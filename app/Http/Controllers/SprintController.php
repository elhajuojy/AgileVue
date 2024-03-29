<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SprintController extends Controller
{
    //

    public function index(Project $project){

        return Inertia::render("projects/Sprints",[
           "sprints"=> $project->sprints
        ]);
    }

    public function store(Request $request){
        Sprint::create([
            "name"=>fake()->name,
            "description"=>fake()->name,
            "project_id"=>$request->input("project_id"),
            "start_date"=>fake()->date,
            "end_date"=>fake()->date ,
            "status"=>fake()->name,
            "goal"=>fake()->name,
            "project_key"=>fake()->name,
        ]);
        return redirect()->back()->with("success","Sprint added successfully")->with('inertia',[
            'success' => session('success')
        ])->with('flash', [
            'success' => session('success')
        ]);

    }


    public function issues(Sprint $sprint){
        return $sprint->issues;
    }

    public function destroy($project,$sprint){
        $sprint = Sprint::find($sprint);
        $sprint->delete();
        return redirect()->back()->with("success","Sprint deleted successfully");
    }


    public function updateIssueSprint(Sprint $sprint, Issue $issue){

        $issue->sprint_id = $sprint->id;
        $issue->save();
        return redirect()->back()->with("success","Issue removed from sprint successfully");
    }
}
