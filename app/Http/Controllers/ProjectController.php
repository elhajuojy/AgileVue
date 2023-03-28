<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //

    public function index()
    {
        return Inertia::render('projects/index', [
            "projects"=>Project::all()
        ]);
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

        return Inertia::render('projects/board', [

            "project"=>$project
        ]);
    }
}
