<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $employee='employee';
    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'celular',
        'since_id',
        'departament_id',
    ];
    protected $timestamp=false;
}
