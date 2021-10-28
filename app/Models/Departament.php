<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;
    protected $departament='departament';
    protected $fillable = [
        'nombre',
        'descripcion',
        'telefono',
    ];
    protected $timestamp=false;
}
