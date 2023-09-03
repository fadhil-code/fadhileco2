<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_langs extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'langname',
        'pres'
    ];
}
