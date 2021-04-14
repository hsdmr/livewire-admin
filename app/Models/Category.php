<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    public function seo(){
        return $this->hasOne('App\Models\Slug','id','seo_id');
    }
}
