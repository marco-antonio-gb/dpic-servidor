<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table = 'requisitos';
    protected $primaryKey = 'idRequisito';
    protected $fillable = [
        'nombre',
        'archivo',
        'descripcion'
    ]; 
    public $timestamps = false;
}
