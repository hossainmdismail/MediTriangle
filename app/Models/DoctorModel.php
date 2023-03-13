<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'career_title',
        'speciality',
        'profile',
    ];

    public function con_country(){
        return $this->belongsTo(CountryModel::class, 'country_id');
    }
    public function con_state(){
        return $this->belongsTo(StateModel::class, 'state_id');
    }
    public function con_hospital(){
        return $this->belongsTo(HospitalModel::class, 'hospital_id');
    }
    public function con_department(){
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }

}
