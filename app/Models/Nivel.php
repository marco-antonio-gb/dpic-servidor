<?php

namespace App\Models;
use App\Models\Postgrado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $primaryKey = 'idNivel';
    protected $fillable = [
        'nombre',
        'descripcion'
    ]; 
    public $timestamps = false;

    public  function postgrados(){
        return $this->belongsTo(Postgrado::class,'nivel_id');
    }
}
