<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'name',
        'slug',
        'codigo',
        'medida_id',
        'precio',
        'temperatura',
        'descripcion',
        'beneficios',
        'fecha',
        'category_id',
        'tipo_id',
        'marca_id'
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


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function ingresos()
    {
        return $this->belongsToMany(Ingreso::class);
    }
    public function salidas()
    {
        return $this->belongsToMany(Salida::class);
    }

}
