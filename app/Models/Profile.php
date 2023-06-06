<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sector(){
        return $this->hasOne(Sector::class, 'id', 'sector_id');
    }
    public function country(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function region(){
        return $this->hasOne(Region::class, 'id', 'region_id');
        // return DB::table('regions')->whereColumn('regions.id', '=', 'profiles.region_id')->first();
    }
    public function districts(){
        return $this->hasOne(District::class, 'id', 'district_id');
    }
    public function townships(){
        return $this->hasOne(Township::class, 'id', 'township_id');
    }
    public function landtype(){
        return $this->hasOne(Landtype::class, 'id', 'landtype_id');
    }
    public function businesszone(){
        return $this->hasOne(Businesszone::class, 'id', 'businesszone_id');
    }
    public function commercial_country(){
        return $this->hasOne(Country::class, 'id', 'commercial_country_id');
    }
    public function currency(){
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }
}
