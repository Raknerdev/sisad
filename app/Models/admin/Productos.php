<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'codigo',
        'name',
        'precio_vip',
        'precio_m',
        'precio_d'
    ];
    protected $guarded = ['id'];
}
