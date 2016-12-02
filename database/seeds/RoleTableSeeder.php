<?php

use Illuminate\Database\Seeder;
use llstarscreamll\Core\Models\Role;
use llstarscreamll\Core\Models\Permission;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        $user = new Role();
        $user->slug = 'user';
        $user->name = 'Invitado';
        $user->description = 'Rol sin permisos';
        $user->save();

        $admin = new Role();
        $admin->slug = 'admin';
        $admin->name = 'Administrator';
        $admin->description = 'Rol con permisos sobre la mayoría de funciones del sistema';
        $admin->save();

        $permissions = Permission::pluck('id')->toArray();

        $admin->permissions()->sync($permissions);
    }
}