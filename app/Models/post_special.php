<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_special extends Model
{
    use HasFactory;
    protected $table="post_special";
    protected $fillable = [
        'pid',
        'spid',
    ];
    public function specialties(){
        return $this->hasMany('App\Models\specialties','id','spid');
    }
}
