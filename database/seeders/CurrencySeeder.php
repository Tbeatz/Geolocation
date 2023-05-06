<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Currency::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name', 'name_mm'];
        $items = [
            [1, 'USD', 'ဒေါ်လာ'],
            [2, 'MMK', 'ကျပ်'],
        ];

        foreach ($items as $item){
            Currency::create(array_combine($columns,$item));
        }
    }
}
