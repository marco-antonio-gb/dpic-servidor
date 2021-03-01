<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postgrado;
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
    public function postgrados(){
        return $this->belongsToMany(Postgrado::class,'materia_postgrado','materia_id','postgrado_id');
    }
}
