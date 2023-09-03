<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_cirtificates extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'cname',
        'date1'
    ];
}
