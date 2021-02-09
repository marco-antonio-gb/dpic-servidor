<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'idMateria';
    protected $fillable = [
        'nombre',
        'sigla',
        'descripcion',
        'credito'
    ];
    public $timestamps = false;
}