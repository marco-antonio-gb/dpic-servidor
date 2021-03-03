<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'idPago';
    protected $fillable = [
        'item',
        'costo_unitario',
        'boleta',
        'fecha_cobro',
        'observacion',
        'postgrado_id',
        'inscripcion_id',
        'postgraduante_id'
    ]; 
    public function postgrados(){
        return $this->belongsTo(Postgrado::class,'postgrado_id');
    }
    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'inscripcion_id');
    }
}
