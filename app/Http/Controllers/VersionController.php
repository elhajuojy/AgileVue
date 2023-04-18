<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function versions(Project $project){
        if (request()->input("search")){
            $versions = DB::table("versions")
                ->where("project_id",$project->id)
                ->where("name","like","%".request()->input("search")."%")
                ->orWhere("description","like","%".request()->input("search")."%")
                ->orWhere("type","like","%".request()->input("search")."%")
                ->orWhere("status","like","%".request()->input("search")."%")
                ->paginate(10)

            ;

            return Inertia::render('projects/Versions', [
                "versions"=>$versions
            ]);
        }


        $versions = DB::table("versions")->where("project_id",$project->id)->paginate(10);
        return Inertia::render('projects/Versions', [
            "versions"=>$versions
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Project $project ,Request $request)
    {

        $attributes = $request->validate([
            "name" => "required",
            "type" => "required" ,
            "status" => "required",
            "description" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);


        $attributes["project_id"] = $project->id;
        $attributes["release_date"] = $attributes["end_date"];
        $attributes["archived"] = 0;


        version::create($attributes);

//        return redirect()->back()->with("success","version has been created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(version $version)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(version $version)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, version $version)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(version $version)
    {
        //
    }
}
