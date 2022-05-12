<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallesalida extends Model
{
    use HasFactory;
    protected $table = 'detallesalidas';
    protected $fillable = [
        'id_inventario',
        'id_salida',
        'cantidad',
        'lote',
        'precio',
        'store_id',
        'orden_fabricacion',
        'fecha_vencimiento',
        'area_destino',
        'observaciones'
        ];
}
