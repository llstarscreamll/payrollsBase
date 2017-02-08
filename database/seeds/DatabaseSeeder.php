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

        $this->call(CountryPermissionsSeeder::class);
        $this->call(DepartmentPermissionsSeeder::class);
        $this->call(MunicipalityPermissionsSeeder::class);
        $this->call(IdentityCardTypePermissionsSeeder::class);
        $this->call(ContributorClassPermissionsSeeder::class);
        $this->call(LegalCompanyNaturePermissionsSeeder::class);
        $this->call(ContributorTypePermissionsSeeder::class);
        $this->call(PayrollTypePermissionsSeeder::class);
        $this->call(ArlCompanyPermissionsSeeder::class);
        $this->call(BankPermissionsSeeder::class);
        $this->call(PilaPaymentOperatorPermissionsSeeder::class);
        $this->call(CompanyPermissionsSeeder::class);
        $this->call(BranchOfficePermissionsSeeder::class);
        $this->call(EmployeeContributorTypePermissionsSeeder::class);
        
        $this->call(PayrollsBaseDataSeeder::class);

        $this->call(AttachPermissionsToAdminRoleSeeder::class);
    }
}
