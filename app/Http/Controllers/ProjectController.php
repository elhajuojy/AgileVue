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

        return Inertia::render('projects/show', [
            "project"=>$project
        ]);
    }
}
