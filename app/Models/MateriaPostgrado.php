<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class MateriaPostgrado extends Model
{
    protected $table = 'materia_postgrado';
 
    protected $fillable = [
        'materia_id',
        'postgrado_id'
    ]; 
    
}
