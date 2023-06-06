<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointedLabour extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile(){
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }
}
