<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postss extends Model
{
    use HasFactory;
    protected $table="postss";

    protected $fillable = [
        'uid',
        'active',
        'title',
        'body',
        'postdate',
    ];
    public function post_photo(){
        return $this->hasMany('App\Models\post_photo','pid');
    }
    public function post_special(){
        return $this->hasMany('App\Models\post_special','pid');
    }
    public function User(){
        return $this->hasOne('App\Models\User','id','uid');
    }
}
