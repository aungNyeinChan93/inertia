<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;
use Database\Factories\HouseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        House::factory(10)->create();

    }
}
