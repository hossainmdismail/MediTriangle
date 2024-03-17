<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    public function con_to_hospital(){
        return $this->hasMany(HospitalModel::class, 'country_id');
    }
}
