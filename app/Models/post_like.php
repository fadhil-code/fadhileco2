<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_like extends Model
{
    use HasFactory;
    protected $table="post_like";
    protected $fillable = [
        'pid',
        'uid',
    ];
    public function users(){
        return $this->hasOne('App\Models\User','id','uid');
    }
    public function postss(){
        return $this->hasOne('App\Models\postss','id','pid');
    }
}
