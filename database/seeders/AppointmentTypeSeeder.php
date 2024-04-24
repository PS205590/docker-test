<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Type::create(['name' => 'shift']);
        Type::create(['name' => 'illness']);
        Type::create(['name' => 'vacation']);
        Type::create(['name' => 'paternal leave']);
    }
}
