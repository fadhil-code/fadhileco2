<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'phone',
        'facebook',
        'instagram',
        'telegram',
        'linkdin',
        'website'
    ];
}
