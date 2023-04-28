<?php

namespace Database\Seeders;

use App\Models\PermitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PermitType::truncate();
        Schema::enableForeignKeyConstraints();
        $columns = ['id', 'name_mm', 'name', 'type'];

        $items = [
            [1, 'မြန်မာနိုင်ငံ ရင်းနှီးမြှုပ်နှံမှုကော်မရှင် ခွင့်ပြုမိန့်', 'Myanmar Investment Commission (MIC) Permit', 'မြန်မာနိုင်ငံ ရင်းနှီးမြှုပ်နှံမှုကော်မရှင်'],
            [2, 'မြန်မာနိုင်ငံ ရင်းနှီးမြှုပ်နှံမှုကော်မရှင် အတည်ပြုမိန့်', 'Myanmar Investment Commission (MIC) Endorsement', 'မြန်မာနိုင်ငံ ရင်းနှီးမြှုပ်နှံမှုကော်မရှင်'],
            [3, 'ကချင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Kachin State Investment Committee (KCSIC) Endorsement', 'ကချင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [4, 'ကယားပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Kayah State Investment Committee (KSIC) Endorsement', 'ကယားပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [5, 'ကရင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Karen State Investment Committee (KYNIC) Endorsement', 'ကရင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [6, 'ချင်းပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Chin State Investment Committee (CSIC) Endorsement', 'ချင်းပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [7, 'မွန်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Mon State Investment Committee (MSIC) Endorsement', 'မွန်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [8, 'ရခိုင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Rakhine State Investment Committee (RSIC) Endorsement', 'ရခိုင်ပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [9, 'ရှမ်းပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Shan State Investment Committee (SSIC) Endorsement', 'ရှမ်းပြည်နယ် ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [10, 'နေပြည်တော်ကောင်စီရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Naypyitaw Council Investment Committee (NCIC) Endorsement', 'နေပြည်တော်ကောင်စီရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [11, 'စစ်ကိုင်းတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Sagaing Region Investment Committee (SRIC) Endorsement', 'စစ်ကိုင်းတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [12, 'တနင်္သာရီတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Tanintharyi Region Investment Committee (TRIC) Endorsement', 'တနင်္သာရီတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [13, 'ပဲခူးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Bago Region Investment Committee (BRIC) Endorsement', 'ပဲခူးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [14, 'မကွေးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Magway Region Investment Committee (MRIC) Endorsement', 'မကွေးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [15, 'မန္တလေးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Mandalay Region Investment Committee (MRIC) Endorsement', 'မန္တလေးတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [16, 'ရန်ကုန်တိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Yangon Region Investment Committee (YRIC) Endorsement', 'ရန်ကုန်တိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [17, 'ဧရာဝတီတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ အတည်ပြုမိန့်', 'Irrawaddy Region Investment Committee (ARIC) Endorsement', 'ဧရာဝတီတိုင်းဒေသကြီး ရင်းနှီးမြှုပ်နှံမှုကော်မတီ'],
            [18, 'အခြားဌာန', 'Other', 'အခြားကော်မတီ'],
        ];

        foreach ($items as $item) {
            PermitType::create(array_combine($columns, $item));
        }
    }
}
