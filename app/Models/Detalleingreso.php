<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    use HasFactory;
    protected $table = 'detalleingresos';
    protected $fillable = [
        'producto_id',
        'ingreso_id',
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
