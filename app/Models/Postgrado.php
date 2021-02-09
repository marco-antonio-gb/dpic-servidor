<?php

namespace App\Models;

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
}
