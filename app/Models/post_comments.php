<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_comments extends Model
{
    use HasFactory;
    protected $table="post_comments";
    protected $fillable = [
        'pid',
        'uid',
        'comment',
        'commentdate',
    ];
    public function users(){
        return $this->hasOne('App\Models\User','id','uid');
    }
}
