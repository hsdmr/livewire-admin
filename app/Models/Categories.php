<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory,SoftDeletes;
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
