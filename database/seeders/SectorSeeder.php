<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/agriculture.png'))),
        ]);

        Sector::create([
            'name' => 'Livestock & Fisheries',
            'name_mm' => 'မွေးမြူရေးနှင့်ရေလုပ်ငန်း',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/livestock.png'))),
        ]);

        Sector::create([
            'name' => 'Mining',
            'name_mm' => 'သတ္တုတွင်း',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/mining.png'))),
        ]);

        Sector::create([
            'name' => 'Manufacturing',
            'name_mm' => 'ကုန်ထုတ်လုပ်မှု',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/manufacturing.png'))),
        ]);

        Sector::create([
            'name' => 'Power',
            'name_mm' => 'စွမ်းအား',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/power.png'))),
        ]);

        Sector::create([
            'name' => 'Oil and Gas',
            'name_mm' => 'ရေနံနှင့်သဘာဝဓာတ်ငွေ့',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/oil-gas.png'))),
        ]);

        Sector::create([
            'name' => 'Construction',
            'name_mm' => 'ဆောက်လုပ်ရေး',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/construction.png'))),
        ]);

        Sector::create([
            'name' => 'Transport & Communication',
            'name_mm' => 'ပို့ဆောင်ရေးနှင့်ဆက်သွယ်ရေး',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/transport-communication.png'))),
        ]);

        Sector::create([
            'name' => 'Hotel & Tourism',
            'name_mm' => 'ဟိုတယ်နှင့်ခရီးသွားလုပ်ငန်း',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/hotel-tourism.png'))),
        ]);

        Sector::create([
            'name' => 'Real Estate',
            'name_mm' => 'အိမ်ခြံမြေအကျိုးဆောင်',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/real-estate.png'))),
        ]);

        Sector::create([
            'name' => 'Industrial Estate',
            'name_mm' => 'စက်မှုဇုန်',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/industrial-estate.png'))),
        ]);

        Sector::create([
            'name' => 'Other Services',
            'name_mm' => 'အခြားဝန်ဆောင်မှုများ',
            'icon' => Storage::disk('public')->put('icons', new File(public_path('img/icons/other-service.png'))),
        ]);
    }
}
