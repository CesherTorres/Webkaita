<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;

    protected $table = 'ubigeos';
    protected $fillable = [
        'departamento',
        'provincia',
        'distrito',
        'ubigeo'
    ];

    public function stores()
        {
            return $this->hasMany(Store::class);
        }
}
