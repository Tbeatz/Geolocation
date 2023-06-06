<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('townships')->truncate();
        DB::table('districts')->truncate();
        DB::table('regions')->truncate();

        Schema::enableForeignKeyConstraints();

        $all = getcsv(__DIR__.'/regions.csv');
        array_shift($all);
        $translations = collect(['regions', 'districts', 'townships'])
            ->flatMap(fn ($n) => getcsv(__DIR__.'/'.$n.'_translation.csv'))
            ->mapWithKeys(fn ($k) => [$k[0] => $k[1]]);
        $t = fn ($k, $r = '') => Str::of($translations->get($k))->remove($r, false)->trim();

        $keyed_zones = json_decode(file_get_contents(__DIR__.'/business_zones.json'));

        DB::transaction(function () use ($all, $keyed_zones, $t) {
            foreach ($all as $key => [, $region_name, $district_name, $township_name]) {
                printf("seed: %s\n", implode(' | ', [$key, $region_name, $district_name, $township_name]));

                if (! $region_name) {
                    continue;
                }
                $region = Region::firstOrCreate(
                    ['name' => $t($region_name)],
                    ['name_mm' => $region_name],
                );

                foreach ($keyed_zones?->$region_name ?? [] as $zone) {
                    $region->business_zones()->firstOrCreate(
                        ['name' => $zone->name],
                        ['name_mm' => $zone->nameMM],
                    );
                }

                if (! $district_name) {
                    continue;
                }
                $district = $region->districts()->firstOrCreate(
                    ['name' => $t($district_name, 'district')],
                    ['name_mm' => $district_name],
                );

                if (! $township_name) {
                    continue;
                }
                $township = $district->townships()->firstOrCreate(
                    ['name' => $t($township_name, 'township')],
                    ['name_mm' => $township_name],
                );
            }
        });
    }
}
