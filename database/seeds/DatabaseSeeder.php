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
        $this->userCall();
        // $this->AdminCall();
        $this->call(CarSeeder::class);  #2
        $this->call(PriceSeeder::class); #3
        $this->call(ServiceSeeder::class); #5
        $this->call(ServiceTypesSeeder::class); #6
        $this->call(AppointmentSeeder::class); #4
        $this->call(InvoiceSeeder::class); #4
        $this->call(ReviewTableSeeder::class); #4
    }


    /** Call user seeder */
    public function userCall(){
       return  $this->call(UserSeeder::class); #1
    }

    /** Call user seeder */
    public function AdminCall(){
       return  $this->call(AdminSeeder::class); #1
    }
}
