<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_skills extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'skname'
    ];
}
