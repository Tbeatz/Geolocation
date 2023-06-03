<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all = getcsv(__DIR__.'/nationalities.csv');
        foreach ($all as [$result]) {
            Nationality::firstOrCreate(['name' => $result]);
        }
    }
}
