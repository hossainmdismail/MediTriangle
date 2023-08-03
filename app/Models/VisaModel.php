<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaModel extends Model
{
    use HasFactory;

    protected $fillable =[
        'status',
        'order_status',
        'appointment_date',
        'message',
        'notifications'
    ];
    protected $casts = [
       'expected_date' => 'datetime',
       'appointment_date' => 'datetime',
    ];

    function con_reports(){
        return $this->belongsTo(VisaModelResport::class, 'order_id');
    }
    function con_country(){
        return $this->belongsTo(CountryModel::class, 'country_id');
    }
    function con_state(){
        return $this->belongsTo(StateModel::class, 'state_id');
    }
    function con_hospital(){
        return $this->belongsTo(HospitalModel::class, 'hospital_id');
    }

    function con_department(){
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }
    function con_doctor(){
        return $this->belongsTo(DoctorModel::class, 'doctor_id');
    }
    function con_visa(){
        return $this->belongsTo(VisaType::class, 'visa_id');
    }
    function con_embassy(){
        return $this->belongsTo(Embassy::class, 'embassy_id');
    }
}
