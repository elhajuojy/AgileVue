<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends Model
{
    use HasFactory;



    protected $guarded =[];



    public function  comments():HasMany{
        return $this->hasMany(Comment::class);
    }


    public function  attachments():HasMany{
        return $this->hasMany(Attachment::class);
    }
}
