<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_studes extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'stname',
        'special',
        'university',
        'collage',
        'date1',
        'date2',
        'country',
        'city'
    ];
}
