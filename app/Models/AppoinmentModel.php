<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppoinmentModel extends Model
{
    use HasFactory;


    function con_department(){
        return $this->belongsTo(DepartmentModel::class , 'department_id');
    }
    function con_state(){
        return $this->belongsTo(StateModel::class , 'state_id');
    }
    function con_hospital(){
        return $this->belongsTo(HospitalModel::class , 'hospital_id');
    }
    function con_doctor(){
        return $this->belongsTo(DoctorModel::class, 'doctor_id');
    }

    function con_attendant(){
        return $this->belongsTo(attendant::class, 'order_id');
    }
}
