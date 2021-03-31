<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug_id',
        'media_id',
        'parent',
        'title',
        'content',
        'type',
        'count'
    ];
    public function posts(){
        return $this->belongsToMany(Posts::class);
    }
    public function seo(){
        return $this->hasOne('App\Models\Slugs','id','seo_id');
    }
}
