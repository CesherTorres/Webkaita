<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'choferes';
    protected $fillable = [
        'ruc',
        'dni',
        'name',
        'direccion',
        'brevete',
        'placa'
        ];

    public function salidas()
    {
        return $this->hasOne(Salida::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
