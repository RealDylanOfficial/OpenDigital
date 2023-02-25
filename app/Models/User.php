<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    public $primaryKey = "id";

    public $timestamps = true;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
