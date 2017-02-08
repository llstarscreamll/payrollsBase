<?php

use Illuminate\Database\Seeder;
use llstarscreamll\Core\Models\Role;
use llstarscreamll\Core\Models\User;

class DefaultUsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $data[] =[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ];

        $data[] =[
            'name' => 'Travis Orbin',
            'email' => 'travis.orbin@example.com',
            'password' => bcrypt('123456'),
        ];

        $data[] =[
            'name' => 'Johan Alvarez',
            'email' => 'llstarscreamll@hotmail.com',
            'password' => bcrypt('123456'),
        ];

        user::insert($data);

        $adminRole = Role::where('slug', 'admin')->first()->id;

        foreach (User::all() as $user) {
            // añadimos rol de administrador al usuario de prueba
            $user->attachRole($adminRole);
        }
    }
}
