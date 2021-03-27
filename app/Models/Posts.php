<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'slug_id',
        'user_id',
        'media_id',
        'post_id',
        'parent',
        'title',
        'content',
        'post_status',
        'type',
        'order',
        'comment_status',
        'comment_count'
    ];

    public function categories(){
        return $this->belongsToMany(Categories::class);
    }
    public function seo(){
        return $this->hasOne('App\Models\Slugs','id','slug_id');
    }
}
