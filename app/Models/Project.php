<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function users(){
        return $this->belongsToMany(User::class,"user_projects","project_id","user_id")->withPivot("role","invitation_status");
    }

    public function sprints(){
        return $this->hasMany(Sprint::class);
    }


    public function issues(){
        return $this->hasMany(Issue::class);
    }
}
