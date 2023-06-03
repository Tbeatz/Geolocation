<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nationality(){
        return $this->hasOne(Nationality::class, 'id', 'nationality_id');
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }
}
