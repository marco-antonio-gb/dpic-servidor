<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class DocenteMateria extends Model
{
    protected $table = 'docente_materia';
 
    protected $fillable = [
        'materia_id',
        'docente_id',
        'postgrado_id'
    ]; 
}
