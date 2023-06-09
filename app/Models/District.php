<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'name_mm', 'region_id'];

    public function townships(){
        return $this->hasMany(Township::class, 'district_id', 'id');
    }
}
