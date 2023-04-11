<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    //


    public  function issues(Project $project){
        $issues = $project->issues()->where("sprint_id","0")->get();
        return response()->json($issues);
    }


    public function updateIssueBacklog(Issue $issue){
        $issue->sprint_id = 0;
        $issue->save();
        return redirect()->back()->with("success","Issue removed from sprint successfully");
    }
}
