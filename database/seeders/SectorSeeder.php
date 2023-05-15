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
            'name' => 'Agriculture',
            'name_mm' => 'စိုက်ပျိုးရေး',
        ]);

        Sector::create([
            'name' => 'Livestock & Fisheries',
            'name_mm' => 'မွေးမြူရေးနှင့်ရေလုပ်ငန်း',
        ]);

        Sector::create([
            'name' => 'Mining',
            'name_mm' => 'သတ္တုတွင်း',
        ]);

        Sector::create([
            'name' => 'Manufacturing',
            'name_mm' => 'ကုန်ထုတ်လုပ်မှု',
        ]);

        Sector::create([
            'name' => 'Power',
            'name_mm' => 'စွမ်းအား',
        ]);

        Sector::create([
            'name' => 'Oil and Gas',
            'name_mm' => 'ရေနံနှင့်သဘာဝဓာတ်ငွေ့',
        ]);

        Sector::create([
            'name' => 'Construction',
            'name_mm' => 'ဆောက်လုပ်ရေး',
        ]);

        Sector::create([
            'name' => 'Transport & Communication',
            'name_mm' => 'ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေး',
        ]);

        Sector::create([
            'name' => 'Hotel & Tourism',
            'name_mm' => 'ဟိုတယ်နှင့်ခရီးသွားလုပ်ငန်း',
        ]);

        Sector::create([
            'name' => 'Real Estate',
            'name_mm' => 'အိမ်ခြံမြေအကျိုးဆောင်',
        ]);

        Sector::create([
            'name' => 'Industrial Estate',
            'name_mm' => 'စက်မှုဇုန်',
        ]);

        Sector::create([
            'name' => 'Other Services',
            'name_mm' => 'အခြားဝန်ဆောင်မှုများ',
        ]);
    }
}
