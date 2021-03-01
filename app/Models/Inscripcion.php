<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;
use App\Models\Postgraduante;
use App\Models\Postgrado;

class Inscripcion extends Model
{
    protected $table="inscripciones";
    protected $primaryKey="idInscripcion";
    protected $fillable=[
            'gestion',
            'fecha_registro',
            'monto',
            'boleta',
            'postgrado_id',
            'postgraduante_id',
    ];
    public $timestamps = false;
    public function postgraduantes(){
        return $this->belongsTo(Postgraduante::class,'postgraduante_id');
    }
    public function postgrados(){
        return $this->belongsTo(Postgrado::class,'postgrado_id');
    }
}
