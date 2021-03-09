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
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(ServiceTypesSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
