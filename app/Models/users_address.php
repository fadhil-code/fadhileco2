<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_address extends Model
{
    protected $table="users_address";
    use HasFactory;
    protected $fillable = [
        'uid',
        'country',
        'city'
    ];
}
