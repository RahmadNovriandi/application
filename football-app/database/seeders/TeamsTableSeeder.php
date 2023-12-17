<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::create(['name' => 'Persib']);
        Club::create(['name' => 'Arema']);
        Club::create(['name' => 'Persija']);
    }
}
