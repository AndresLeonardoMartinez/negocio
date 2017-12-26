<?php

use Illuminate\Database\Seeder;
use App\categoria;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->delete();
        categoria::create(['name'=>'macetas','descripcion'=>'Contenedor, normalmente en forma de cono truncado con un agujero en el fondo para el drenaje, utilizado para cultivar plantas tanto de exterior como de interior']);
        categoria::create(['name'=>'plantines','descripcion'=>'planta en su estadío inicial antes de desarrollarse completamente']);
        categoria::create(['name'=>'cactus','descripcion'=>'plantas de flores muy vistosas que suelen tener espinas y requieren muy poca agua']);
    }
}
