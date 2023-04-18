<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class IssueController extends Controller
{
    //

    public function destroy(Issue $issue): RedirectResponse
    {
        $issue->delete();
        return redirect()->back()->with("success","Deleted");
    }


    public function assignIssue(){
        $issue = Issue::find(request()->input("issue_id"));
        $issue->assigned_id = request()->input("assigned_id");
        $issue->save();
        return redirect()->back()->with("success","Assigned");
    }


    public function IssueChangeStatus(Issue $issue){
        $issue->status = request()->input("status");
        $issue->save();

    }
    public function store(Project $project){
        //dd(request()->all());
       $attrs =  [
            //
            'user_id' => auth()->user()->id,
            'sprint_id' => request()->input("sprint_id"),
            'title' => request()->input("title"),
            'description' => fake()->text(),
            'status' => fake()->randomElement(['todo', 'in_progress', 'done',"blocked"]),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'type' => fake()->randomElement(['bug', 'feature', 'task']),
            'assignee' => fake()->name(),
            'reporter' => fake()->name(),
            'epic' => fake()->sentence(),
            'story_points' => fake()->randomDigit(),
            'time_estimate' => fake()->randomDigit(),
            'time_spent' => fake()->randomDigit(),
            'time_remaining' => fake()->randomDigit(),
            'resolution' => fake()->randomElement(['fixed', 'wont_fix', 'duplicate', 'incomplete', 'cant_reproduce', 'done']),
            'resolution_date' => fake()->dateTimeBetween('-1 week', 'now'),
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'created'=>fake()->dateTimeBetween('-1 week', 'now'),
            'updated'=>fake()->dateTimeBetween('-1 week', 'now'),
            'labels' => fake()->randomElement(['bug', 'feature', 'task']),
            'components' => fake()->randomElement(['bug', 'feature', 'task']),
           'project_id'=>request()->input("project_id")
        ];

       Issue::create($attrs);
       return redirect()->back()->with("message","issue add with success ");
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

    public function deleteComment(Comment $comment){
        $comment->delete();
        return redirect()->back()->with("success","Comment Deleted");
    }
}
