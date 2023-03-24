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
    public function flags(){
        return $this->hasMany('App\Models\Flag');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->tags()->detach();
            $post->comment()->delete();
            $post->flags()->delete();
            $post->likes()->delete();
        });
    }
}
