<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['username', 'password','email'];
    public $primaryKey = "id";
    public $timestamps = true;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
