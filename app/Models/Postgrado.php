<?php

namespace App\Models;

use App\Models\Materia; 
use App\Models\Nivel; 
use App\Models\Inscripcion; 
use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
    protected $table = 'postgrados';
    protected $primaryKey ='idPostgrado';
    protected $fillable =[
        'nombre',
        'fecha_inicio',
        'fecha_final',
        'cantidad_pagos',
        'precio',
        'gestion',
        'nivel_id'
    ];

    public $timestamps = false;
    public function materias(){
        return $this->belongsToMany(Materia::class,'materia_postgrado','postgrado_id','materia_id');
    }

    public function niveles(){
        return $this->belongsTo(Nivel::class,'nivel_id');
    }
    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'postgrado_id');
    }
}
