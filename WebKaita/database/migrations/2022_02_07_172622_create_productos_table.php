<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('codigo');
            $table->decimal('temperatura', 11,2);
            $table->string('descripcion');
            $table->string('beneficios');
            $table->string('imagen');
            $table->date('fecha');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('medida_id');
            $table->unsignedBigInteger('tipo_id');
            
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('medida_id')->references('id')->on('medidas');
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
        Schema::dropIfExists('productos');
    }
}
