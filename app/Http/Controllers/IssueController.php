<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Issue;
use Illuminate\Http\RedirectResponse;

class IssueController extends Controller
{
    //

    public function destroy(Issue $issue): RedirectResponse
    {
        $issue->delete();
//        dd($issue);
//        $issue->save();
        return redirect()->back()->with("success","Deleted");
    }


    public function addComment(){
        $data = request()->validate([
            "body"=>"required",
            "issue_id"=>"required",
            "user_id"=>"required"
        ]);




            Comment::create($data);


        return redirect()->back()->with("success","Comment Added");
    }

    public function issueComments(Issue $issue){

        return $issue->comments ;
    }
}
