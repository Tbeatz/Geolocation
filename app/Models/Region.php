<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'name_mm'];

    public function districts()
    {
        return $this->hasMany(District::class, 'region_id', 'id');
    }
    public function business_zones()
    {
        return $this->hasMany(BusinessZone::class);
    }
}
