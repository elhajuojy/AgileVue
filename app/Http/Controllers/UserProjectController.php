<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProjectController extends Controller
{
    //


    public function find(){
        dd(Request::input("search"));

    }
}
