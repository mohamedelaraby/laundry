<?php

use App\Models\Appointment;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Appointment::class, 500)->create();
    }
}
