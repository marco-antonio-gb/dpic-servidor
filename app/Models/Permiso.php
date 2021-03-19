<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permissions';
   
    protected $fillable = [
        'name',
        'guard_name',
        'descripcion'
    ]; 
    
}
