<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
    protected $primaryKey = 'idCalificacion';
    
    protected $fillable = [
        'nota_numerica',
        'nota_literal',
        'observacion',
        'fecha_registro',
        'materia_id',
        'docente_id',
        'postgrado_id',
        'postgraduante_id',
    ]; 
    
}