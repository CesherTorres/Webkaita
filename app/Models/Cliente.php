<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'identificacion',
        'name',
        'direccion'
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
