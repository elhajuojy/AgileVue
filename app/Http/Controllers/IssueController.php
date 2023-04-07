<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
}
