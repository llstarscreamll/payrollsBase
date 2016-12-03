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
        $this->call(RealCompanyTaxpayerTypesTableSeeder::class);
        $this->call(RealEmployeeTaxpayerTypesTableSeeder::class);
        $this->call(RealIdentityCardTypesTableSeeder::class);
        $this->call(RealLegalCompanyNaturesTableSeeder::class);
        $this->call(RealLegalPersonNaturesTableSeeder::class);
    }
}
