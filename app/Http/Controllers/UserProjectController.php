<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProjectController extends Controller
{
    //


    public function find(){
        dd(Request::input("search"));

    }

    public function destroy(){

        DB::table("user_projects",)->where("user_id",\request()
            ->input("user_id"))->where("project_id",\request()->input("project_id"))->delete();

        return redirect()->back()->with("message","the user removed from the project successfully");
    }
}
