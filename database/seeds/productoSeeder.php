<?php

use Illuminate\Database\Seeder;
use App\producto;


class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->delete();
        producto::create(['name'=>'maceta grande' ,'precio'=>5.50 ,'descripcion'=>'maceta grande','categoria_id'=>1]);
        producto::create(['name'=>'maceta mediana' ,'precio'=>4.50 ,'descripcion'=>'maceta mediana','categoria_id'=>1]);
        producto::create(['name'=>'maceta chica' ,'precio'=>3.00 ,'descripcion'=>'maceta chica','categoria_id'=>1]);

        producto::create(['name'=>'margarita' ,'precio'=>12.50 ,'descripcion'=>'planta con flores muy vistosas','categoria_id'=>2]);
        producto::create(['name'=>'malvon' ,'precio'=>5.80 ,'descripcion'=>'planta con flor muy popular','categoria_id'=>2]);
        producto::create(['name'=>'magnolia' ,'precio'=>5.50 ,'descripcion'=>'planta con flor de cuidados especiales','categoria_id'=>2]);

        producto::create(['name'=>'cactus enano' ,'precio'=>15.50 ,'descripcion'=>'cactus exotico','categoria_id'=>3]);


    }
}
