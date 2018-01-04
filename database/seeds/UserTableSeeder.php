<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_admin = Role::where("name", "admin")->first();
        $rol_usuario= Role::where("name", "usuario")->first();

        $administrador = new User();
	    $administrador->name = "Sergio Miguel Lualdi";
	    $administrador->email = "sergio@email.com";
	    $administrador->password = bcrypt("jardin123");
	    $administrador->save();
	    $administrador->roles()->attach($rol_admin);

	    $usuario = new User();
	    $usuario->name = "pepe";
	    $usuario->email = "pepe@email.com";
	    $usuario->password = bcrypt("pepe123");
	    $usuario->save();
	    $usuario->roles()->attach($rol_usuario);
    }
}
