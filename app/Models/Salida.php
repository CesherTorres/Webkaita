<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salidas';
    protected $fillable = [
        'codigo',
        'slug',
        'nguia',
        'total_product',
        'forma_pago',
        'tipo_comprobante',
        'nro_comprobante',
        'forma_pago',
        'destino_store',
        'cliente_id',
        'chofer_id',
        'store_id',
        'motivo_id',
        'tipo_id',
        'user_id'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function motivo()
    {
        return $this->belongsTo(Motivo::class);
    }

    public function inventarios()
    {
        return $this->belongsToMany(Inventario::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
    public function almacenero()
    {
        return $this->belongsTo(Almacenero::class);
    }
}
