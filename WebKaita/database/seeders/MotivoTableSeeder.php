<?php

namespace Database\Seeders;

use App\Models\Motivo;
use Illuminate\Database\Seeder;

class MotivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivo = new Motivo();
        $motivo->name = "Inventario";
        $motivo->slug = "inventario";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo inventario - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Mantenimiento(Recuperacion)";
        $motivo->slug = "mantenimiento-(recuperacion)";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo mantenimiento (recuperación) - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Traslado";
        $motivo->slug = "traslado";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo traslado - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Devolución";
        $motivo->slug = "devolucion";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo devolución - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Cambio";
        $motivo->slug = "cambio";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo cambio - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Merma";
        $motivo->slug = "merma";
        $motivo->tipo_motivo = "Ingreso";
        $motivo->descripcion = "motivo merma - movimiento de ingreso";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Traslado de almacén";
        $motivo->slug = "traslado-de-almacen";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo traslado de almacén - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Venta";
        $motivo->slug = "venta";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo venta - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Obsequio";
        $motivo->slug = "obsequio";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo obsequio - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Promociones";
        $motivo->slug = "promociones";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo promociones - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Bonificaciones";
        $motivo->slug = "bonificaciones";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo bonificaciones - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Mantenimiento(recuperación)";
        $motivo->slug = "mantenimiento-(recuperación)";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo mantenimiento (recuperación) - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Devolución";
        $motivo->slug = "devolución";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo devolución - movimiento de salida";
        $motivo->save();

        $motivo = new Motivo();
        $motivo->name = "Descuento";
        $motivo->slug = "descuento";
        $motivo->tipo_motivo = "Salida";
        $motivo->descripcion = "motivo descuento - movimiento de salida";
        $motivo->save();

        
    }

   
}
