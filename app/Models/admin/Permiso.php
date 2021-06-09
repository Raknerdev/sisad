<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];
    protected $guarded = ['id'];
}
