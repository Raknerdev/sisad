<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $fillable = [
    'nro_cliente',
    'codigo',
    'nombre',
    'direccion',
    'cedula',
    'telefono',
    'tipo'
    ];
    protected $guarded = ['id'];
}
