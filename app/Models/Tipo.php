<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'descripcion'
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

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
    public function salidas(){
        return $this->hasMany(Salida::class);
    }
}
