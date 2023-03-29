<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    protected $fillable = [
        'nav_logo',
        'main_logo',
        'main_title',
        'about_image',
        'name',
        'about_description',
        'address',
        'number',
        'facebook',
        'instagram',
        'twitter',
        'linkdin',
        'youtube',
        'behance'
    ];
}
