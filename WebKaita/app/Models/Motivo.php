<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;

    protected $table = 'motivos';
    protected $fillable = [
        'name',
        'slug',
        'descripcion',
        'tipo_motivo'
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

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
    public function salidas(){
        return $this->hasMany(Salida::class);
    }
}
