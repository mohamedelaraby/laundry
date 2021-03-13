<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class); #1
        // $this->call(CarSeeder::class);  #2
        // $this->call(PriceSeeder::class); #3
        // $this->call(ServiceSeeder::class); #5
        // $this->call(ServiceTypesSeeder::class); #6
        // $this->call(AppointmentSeeder::class); #4
        $this->call(InvoiceSeeder::class); #4
    }
}
