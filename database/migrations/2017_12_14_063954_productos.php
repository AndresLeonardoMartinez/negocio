<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',100);
            $table->float('precio', 6, 2)->default(0);  
            $table->text('descripcion');
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
            $table->integer('categoria_id')->unsigned()->index();

            $table->foreign('categoria_id')->references('id')->on('categorias');


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
