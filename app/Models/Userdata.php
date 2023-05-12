<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function currency(){
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function country(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function sector(){
        return $this->hasOne(Sector::class, 'id', 'sector_id');
    }
}
