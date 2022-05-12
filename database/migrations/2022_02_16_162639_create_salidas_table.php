<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->decimal('total_product', 11,2);
            $table->date('fecha');
            $table->string('nro_serie_guia')->nullable();
            $table->string('nguia')->nullable();
            $table->string('tipo_comprobante')->nullable();
            $table->string('nro_comprobante')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('destino_store')->nullable();
            $table->unsignedBigInteger('motivo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('chofer_id')->nullable();
            $table->unsignedBigInteger('almacenero_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('motivo_id')->references('id')->on('motivos')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete('cascade');
            $table->foreign('almacenero_id')->references('id')->on('almaceneros')->onDelete('cascade');
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
        Schema::dropIfExists('salidas');
    }
}
