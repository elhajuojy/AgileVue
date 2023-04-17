<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //

    public function index()
    {
        return Inertia::render('projects/index', [
            "projects"=>Project::where("user_id",auth()->user()->id)->get()
        ]);
    }


    public function destroy(Project $project){

        $project->delete();
        return redirect("/projects")->with("this project has been deleted successfully ");
    }

    public function show(Project $project)
    {
        sleep(1);
        return Inertia::render('projects/show', [
            "project"=>$project
        ]);
    }


    public function store()
    {
       $attrs =  \request()->validate([
            "name"=>["required", "min:3", "max:255"],
            "description"=>["required", "min:3", "max:255"],
            "project_type"=>["required", "min:3", "max:255"],
        ]);

        $attrs['project_lead'] = fake()->name;
        $attrs['project_key']= fake()->name;
        $attrs['project_avatar']='https://api.dicebear.com/6.x/initials/svg?seed='.fake()->name;
        $attrs['project_cover']='https://api.dicebear.com/6.x/initials/svg?seed='.fake()->name;
        $attrs['project_url'] = fake()->url;
        $attrs['user_id'] = auth()->user()->id ;

        Project::create($attrs);

        return redirect()->back()->with("success","Project added successfully");
    }

    public function board(Project $project){
        $issues = [];

        if (array_key_exists("sprint_id",\request()->all())){
            $issues = Sprint::find(\request()->input("sprint_id"));

        }


        return Inertia::render('projects/board', [
            "users"=>$project->users,
            "project"=>$project,
            "sprints"=>$project->sprints,
            "issues"=>$issues->issues

        ]);
    }

    public function backlog(Project $project){

        return Inertia::render('projects/Backlog', [
            "sprints"=>$project->sprints,
            "project"=>$project
        ]);
    }

    public function declineInvitation(Project $project){

            $project->users()->updateExistingPivot(auth()->user()->id,[
                "invitation_status"=>"declined"
            ]);

            return redirect()->back()->with("success","Invitation declined successfully");
    }

    public function acceptInvitation(Project $project){



        $project->users()->updateExistingPivot(auth()->user()->id,[
            "invitation_status"=>"accepted"
        ]);

        return redirect()->back()->with("success","Invitation accepted successfully");
    }
}
