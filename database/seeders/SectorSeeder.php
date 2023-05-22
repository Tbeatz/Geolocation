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
            'icon' => 'img/icons/agriculture.png',
        ]);

        Sector::create([
            'name' => 'Livestock & Fisheries',
            'name_mm' => 'မွေးမြူရေးနှင့်ရေလုပ်ငန်း',
            'icon' => 'img/icons/livestock.png',
        ]);

        Sector::create([
            'name' => 'Mining',
            'name_mm' => 'သတ္တုတွင်း',
            'icon' => 'img/icons/mining.png',
        ]);

        Sector::create([
            'name' => 'Manufacturing',
            'name_mm' => 'ကုန်ထုတ်လုပ်မှု',
            'icon' => 'img/icons/manufacturing.png',
        ]);

        Sector::create([
            'name' => 'Power',
            'name_mm' => 'စွမ်းအား',
            'icon' => 'img/icons/power.png',
        ]);

        Sector::create([
            'name' => 'Oil and Gas',
            'name_mm' => 'ရေနံနှင့်သဘာဝဓာတ်ငွေ့',
            'icon' => 'img/icons/oil-gas.png',
        ]);

        Sector::create([
            'name' => 'Construction',
            'name_mm' => 'ဆောက်လုပ်ရေး',
            'icon' => 'img/icons/construction.png',
        ]);

        Sector::create([
            'name' => 'Transport & Communication',
            'name_mm' => 'ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေး',
            'icon' => 'img/icons/transport-communication.png',
        ]);

        Sector::create([
            'name' => 'Hotel & Tourism',
            'name_mm' => 'ဟိုတယ်နှင့်ခရီးသွားလုပ်ငန်း',
            'icon' => 'img/icons/hotel-tourism.png'
        ]);

        Sector::create([
            'name' => 'Real Estate',
            'name_mm' => 'အိမ်ခြံမြေအကျိုးဆောင်',
            'icon' => 'img/icons/real-estate.png'
        ]);

        Sector::create([
            'name' => 'Industrial Estate',
            'name_mm' => 'စက်မှုဇုန်',
            'icon' => 'img/icons/industrial-estate.png'
        ]);

        Sector::create([
            'name' => 'Other Services',
            'name_mm' => 'အခြားဝန်ဆောင်မှုများ',
            'icon' => 'img/icons/other-service.png'
        ]);
    }
}
