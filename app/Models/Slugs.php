<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slugs extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'owner',
        'slug',
        'seo_title',
        'seo_description',
        'seo_index',
        'seo_follow',
        'language'
    ];
}
