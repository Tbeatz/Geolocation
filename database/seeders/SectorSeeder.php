<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Sector::truncate();
        Schema::enableForeignKeyConstraints();
        Sector::create([
            'name' => 'Industry',
            'name_mm' => 'စက်မှု',
        ]);
    }
}
