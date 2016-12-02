<?php

use Illuminate\Database\Seeder;

class PayrollsBaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTaxpayerTypesTableSeeder::class);
        $this->call(EmployeeTaxpayerTypesTableSeeder::class);
        $this->call(IdentityCardTypesTableSeeder::class);
        $this->call(LegalCompanyNaturesTableSeeder::class);
        $this->call(LegalPersonNaturesTableSeeder::class);
    }
}
