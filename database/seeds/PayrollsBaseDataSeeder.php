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
        $this->call(RealIdentityCardTypesTableSeeder::class);
        $this->call(RealContributorClassesTableSeeder::class);
        $this->call(RealPayrollTypesTableSeeder::class);
        $this->call(RealEmployeeConstributorTypesTableSeeder::class);
        $this->call(RealLegalCompanyNaturesTableSeeder::class);

        // disabled temporarily
        //$this->call(RealLegalPersonNaturesTableSeeder::class);
    }
}
