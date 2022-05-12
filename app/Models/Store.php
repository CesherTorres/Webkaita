<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';
    protected $fillable = [
            'name',
            'slug',
            'direccion',
            'referencia',
            'descripcion',
            'plano',
            'fecha',
            'ubigeo_id'
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

    public function ubigeo(){
        return $this->belongsTo(Ubigeo::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function ingresos(){
        return $this->hasMany(Ingreso::class);
    }
    public function salidas(){
        return $this->hasMany(Salida::class);
    }
}
