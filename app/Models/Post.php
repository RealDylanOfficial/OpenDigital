<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    public $primaryKey = "id";

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->tags()->detach();
        });
    }
}
