<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['username', 'password_hash','email'];
    public $primaryKey = "id";

    public $timestamps = true;
}
