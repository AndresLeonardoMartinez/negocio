<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $rol_admin = new Role();
    $rol_admin->name = "admin";
    $rol_admin->description = "Administrador del sitio web";
    $rol_admin->save();

    $rol_usuario = new Role();
    $rol_usuario->name = "usuario";
    $rol_usuario->description = "Usuario común";
    $rol_usuario->save();
  }
}