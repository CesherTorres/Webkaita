<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallesalidas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_inventario')->unsigned();
            $table->bigInteger('id_salida')->unsigned();
            $table->unsignedBigInteger('store_id');
            $table->string('lote');
            $table->string('orden_fabricacion');
            $table->decimal('cantidad', 11,2);
            $table->decimal('precio', 11,2);
            $table->decimal('peso_total', 11,2);
            $table->string('fecha_vencimiento');
            $table->string('observaciones')->nullable();
            $table->foreign('id_inventario')->references('id')->on('inventarios')->onDelete('cascade');
            $table->foreign('id_salida')->references('id')->on('salidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallesalidas');
    }
}
