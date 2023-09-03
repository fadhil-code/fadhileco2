<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_jobs_requests extends Model
{
    use HasFactory;
    protected $table="post_jobs_requests";
    protected $fillable = [
        'pid',
        'uid',
        'companyuid',
        'requestdate',
        'accepted',
        
    ];
    public function postss(){
        return $this->hasMany('App\Models\postss','id','pid');
    }
    public function posts(){
        return $this->hasOne('App\Models\postss','id','pid');
    }
    public function users(){
        return $this->hasOne('App\Models\User','id','uid');
    }
    public function companyusers(){
        return $this->hasOne('App\Models\User','id','companyuid');
    }
}
