<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('nguia')->nullable();
            $table->date('fecha');
            $table->decimal('total_product', 11,2);
            $table->string('salida_store')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('motivo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('almacenero_id');

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('motivo_id')->references('id')->on('motivos')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
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
        Schema::dropIfExists('ingresos');
    }
}
