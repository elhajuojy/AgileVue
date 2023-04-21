<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function issue(): BelongsTo{
        return $this->belongsTo(Issue::class);
    }
}
