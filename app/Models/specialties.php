<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialties extends Model
{
    use HasFactory;
    protected $table="specialties";
    protected $fillable = [
        'spname','photo'
      
    ];
    function post_special(){

        return $this->belongsTo('App\Models\post_special');

    }

}
