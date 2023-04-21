<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Sprint;
use Faker\Core\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //

    public function index(): \Inertia\Response
    {
        return Inertia::render('projects/index', [
            "projects"=>Project::where("user_id",auth()->user()->id)->get()
        ]);
    }

    public function update(Project $project): \Illuminate\Http\RedirectResponse
    {
        $attrs =  \request()->validate([
            "name"=>["required", "min:3", "max:255"],
            "description"=>["required", "min:3", "max:255"],
            "project_key"=>["required", "min:3", "max:20"],
            "project_lead"=>["required", "min:3", "max:255"],
        ]);

//        if (array_key_exists("project_cover",\request()->all())){
//            $attrs['project_cover'] = \request()->file("project_cover")->store("covers");
//        }



        $project->update($attrs);

        return redirect()->back()->with("success","Project updated successfully");
    }


    public function edit(Project $project): \Inertia\Response{
        return Inertia::render('projects/Edit', [
            "project"=>$project
        ]);
    }




    public function destroy(Project $project): \Illuminate\Http\RedirectResponse{

        $project->delete();
        return redirect("/projects")->with("this project has been deleted successfully ");
    }

    public function show(Project $project): \Inertia\Response
    {
        sleep(1);
        return Inertia::render('projects/show', [
            "project"=>$project
        ]);
    }


    public function store(): \Illuminate\Http\RedirectResponse
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

    public function board(Project $project): \Inertia\Response{
        $issues = [];

        if (array_key_exists("sprint_id",\request()->all())){
            $issues = Sprint::find(\request()->input("sprint_id"))->issues;

        }


        return Inertia::render('projects/board', [
            "users"=>$project->users,
            "project"=>$project,
            "sprints"=>$project->sprints,
            "issues"=>$issues

        ]);
    }

    public function backlog(Project $project): \Inertia\Response{

        return Inertia::render('projects/Backlog', [
            "sprints"=>$project->sprints,
            "project"=>$project
        ]);
    }

    public function declineInvitation(Project $project): \Illuminate\Http\RedirectResponse{

            $project->users()->updateExistingPivot(auth()->user()->id,[
                "invitation_status"=>"declined"
            ]);

            return redirect()->back()->with("success","Invitation declined successfully");
    }

    public function acceptInvitation(Project $project): \Illuminate\Http\RedirectResponse{



        $project->users()->updateExistingPivot(auth()->user()->id,[
            "invitation_status"=>"accepted"
        ]);

        return redirect()->back()->with("success","Invitation accepted successfully");
    }
}
