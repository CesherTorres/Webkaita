<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios';
    protected $fillable = [
        'producto_id',
        'store_id',
        'cantidad',
        'lote',
        'precio',
        'orden_fabricacion',
        'fecha_vencimiento',
        'area_destino',
        'observaciones'
        ];
    
    public function salidas()
    {
        return $this->belongsToMany(Salida::class);
    }

    public function inventariar($data) {

        
  
        $existencia =  DB::table('inventarios')
                    ->select('inventarios.*')
                    ->where('store_id',$data['store_id'])
                    ->where('producto_id',$data['producto_id'])
                    ->where('lote',$data['lote'])
                    ->where('orden_fabricacion',$data['ordenfabricacion'])
                    ->first();
            
    
            $inventario = Inventario::find($existencia->id);
            switch($data['movimiento']) {
              case 'Salida': //Restado de inventario
                $cantidad = $inventario->cantidad - $data['cantidad'];
                break;
              case 'Ingreso': //Sumado al inventario
                $cantidad  = $data['cantidad'] + $inventario->cantidad;
                break;
            }
    
            //El producto existe en almacen aumentamos su cantidad
            $inventario->cantidad  = $cantidad;
            $inventario->save();
            return true;
    
        }
}
