<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Since extends Model
{
    use HasFactory;
    protected $since='since';
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    protected $timestamp=false;
}
