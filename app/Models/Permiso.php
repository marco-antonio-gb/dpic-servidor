<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'idPermiso';
    protected $fillable = [
        'nombre',
        'descripcion'
    ]; 
    public $timestamps = false;
}
