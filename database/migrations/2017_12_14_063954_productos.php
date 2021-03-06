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
            $table->timestamp('updated_at')->nullable();

            $table->softDeletes();
            $table->integer('categoria_id')->unsigned()->index();
            $table->integer('stock')->default(0);
            $table->boolean('nuevo')->default(false);   

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('imagen',100)->default("");

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
