<?php

use Illuminate\Database\Seeder;
use llstarscreamll\Core\Models\Role;
use llstarscreamll\Core\Models\Permission;

class AttachPermissionsToAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'admin')->first();
        $permissions = Permission::pluck('id')->toArray();

        $admin->permissions()->sync($permissions);
    }
}
