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
        'postgrado_id',
        'postgraduante_id'
    ]; 
    public $timestamps = false;
}
