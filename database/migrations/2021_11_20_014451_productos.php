<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('precio');
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete("cascade");
  
        });
  
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
