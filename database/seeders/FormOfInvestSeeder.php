<?php

namespace Database\Seeders;

use App\Models\FormOfInvest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormOfInvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        FormOfInvest::truncate();
        Schema::enableForeignKeyConstraints();
        $columns = ['id', 'name_mm', 'name'];

        $items = [
            [1, 'ရာခိုင်နှုန်းပြည့်မြန်မာနိုင်ငံသားရင်းနှီးမြုပ်နှံမှု', 'Wholly Myanmar Citizen Investment'],
            [2, 'ရာခိုင်နှုန်းပြည့်နိုင်ငံခြား ရင်းနှီးမြုပ်နှံမှု', 'Wholly Foreign Owned'],
            [3, 'မြန်မာနိုင်ငံသားရင်းနှီးမြုပ်နှံမှု', 'Myanmar Citizen Investment'],
            [4, 'ဖက်စပ်ရင်းနှီးမြုပ်နှံမှု', 'Joint Venture'],
        ];

        foreach ($items as $item) {
            FormOfInvest::create(array_combine($columns, $item));
        }
    }
}
