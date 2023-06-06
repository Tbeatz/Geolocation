<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesszone extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'name_mm', 'region_id'];

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
