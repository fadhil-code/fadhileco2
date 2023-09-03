<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    protected $table="notifications";

    protected $fillable = [
        'pid',
        'body',
        'from_uid',
        'to_uid',
        'readed',
        'notdate',
    ];
    public function users(){
        return $this->hasOne('App\Models\User','id','uid');
    }
    public function formusers(){
        return $this->hasOne('App\Models\User','id','from_uid');
    }
    public function tousers(){
        return $this->hasOne('App\Models\User','id','to_uid');
    }
}
