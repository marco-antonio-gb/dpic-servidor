<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postgrado;
use App\Models\Inscripcion; 

class Postgraduante extends Model
{
    protected $table = 'postgraduantes';
    protected $primaryKey = 'idPostgraduante';
    protected $fillable = [
        'paterno',
        'materno',
        'nombres',
        'ci',
        'ci_ext',
        'lugar_nac',
        'fecha_nac',
        'direc_domicilio',
        'nro_domicilio',
        'telf_domicilio',
        'celular',
        'correo',
        'profesion',
        'lugar_trabajo',
        'telf_trabajo',
        'lugar_estudio',
        'observaciones',
        'fecha_inscripcion',
        'foto'

    ];

    public $timestamps = false;
    
    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'postgrado_id');
    }
}
