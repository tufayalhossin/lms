<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePricetiers extends Model
{
    use HasFactory;
    public function currency(){
        return $this->hasOne('App\Models\Country','currency_code','currency_code');
    }
}
