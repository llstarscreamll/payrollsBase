<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DefaultUsersTableSeeder::class);

        $this->call(LegalCompanyNaturePermissionsSeeder::class);
        $this->call(CountryPermissionsSeeder::class);
        $this->call(MunicipalityPermissionsSeeder::class);
        $this->call(DepartmentPermissionsSeeder::class);
        $this->call(IdentityCardTypePermissionsSeeder::class);
        $this->call(CompanyPermissionsSeeder::class);

        $this->call(AttachPermissionsToAdminRoleSeeder::class);
    }
}
