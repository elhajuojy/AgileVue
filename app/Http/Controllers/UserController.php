<?php

namespace App\Http\Controllers;

use App\Models\UserProject;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('projects/board', [
            "users"=>User::all(),

        ]);
    }

    public function inviteToProject(Request $request){
        $attrs = $request->validate([
            "user_id" => "required",
            "project_id" => "required",
            "role" => "required",
        ]);

        UserProject::create($attrs);
        return redirect()->back()->with("success","User invited successfully");
    }

}
