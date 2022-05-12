<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = 'ingresos';
    protected $fillable = [
        'codigo',
        'slug',
        'nguia',
        'fecha',
        'total_product',
        'store_id',
        'motivo_id',
        'tipo_id',
        'salida_store',
        'cliente_id',
        'user_id'
    ];

         /**
     * Get the route key for the model.
     *
     * @return string
     */
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

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
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
