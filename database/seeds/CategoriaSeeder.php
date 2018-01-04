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
        categoria::create(['name'=>'Macetas','descripcion'=>'Contenedor, normalmente en forma de cono truncado con un agujero en el fondo para el drenaje, utilizado para cultivar plantas tanto de exterior como de interior','imagen'=>'/images/macetas.jpg']);
        categoria::create(['name'=>'Plantines','descripcion'=>'planta en su estadío inicial antes de desarrollarse completamente','imagen'=>'/images/plantines.jpg']);
        categoria::create(['name'=>'Cáctus','descripcion'=>'Plantas de flores muy vistosas que suelen tener espinas y requieren muy poca agua','imagen'=>'/images/cactus.jpg']);
        categoria::create(['name'=>'Artículos de Jardinería','descripcion'=>'Herramientas, artículos de decoración, tierra y todo lo que necesites para que tu jardín esté como se merece','imagen'=>'/images/regadera.jpg']);
        
    }
}
