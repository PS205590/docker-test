<?php

namespace Database\Seeders;

use Carbon\CarbonInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Carbon\Carbon;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Appointment::create([
            'start_time' => '2024-03-20 09:00:00',
            'finish_time' => '2024-03-20 17:00:00',
            'comments' => $this->generateComments(),
            'user_id' => '1',
            'type_id' => '1'
        ]);
        Appointment::create([
            'start_time' => '2024-03-20 09:00:00',
            'finish_time' => '2024-03-20 17:00:00',
            'comments' => $this->generateComments(),
            'user_id' => '2',
            'type_id' => '1'
        ]);
    }



    private function generateComments()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    }

}

