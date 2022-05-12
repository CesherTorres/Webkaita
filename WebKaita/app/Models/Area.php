<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable = [
        'name',
        'slug',
        'descripcion',
        'store_id',
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

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

        