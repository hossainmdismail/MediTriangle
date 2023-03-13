<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalModel extends Model
{
    use HasFactory;

    public function con_country(){
        return $this->belongsTo(CountryModel::class, 'country_id');
    }

    public function con_state(){
        return $this->belongsTo(StateModel::class, 'state_id');
    }
}
