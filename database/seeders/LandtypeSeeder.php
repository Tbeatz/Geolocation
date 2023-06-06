<?php

namespace Database\Seeders;

use App\Models\Landtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LandtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Landtype::truncate();
        Schema::enableForeignKeyConstraints();
        Landtype::create([
            'name' => 'Gram',
            'name_mm' => 'ဂရမ်',
        ]);
        Landtype::create([
            'name' => 'Permit',
            'name_mm' => 'ပါမစ်',
        ]);
    }
}
