<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $garded = [];



    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'profile_image',
        'profile_cover',
        'Job_title',
        'Job_description',
        'Job_location',
        'email_verified_at',
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeFilter($query,array $filters){
//        null Safety
        $query->when($filters['search'] ?? false,function ($query,$search) {

            $query->where('full_name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%' );


        });
    }


    public function projects(){
        return $this->belongsToMany(Project::class,"user_projects","user_id","project_id")->withPivot("role","invitation_status");
    }
}
