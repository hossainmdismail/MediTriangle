<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppoinmentModel extends Model
{
    use HasFactory;

    protected $fillable =[
        'status',
        'activity',
        'order_status',
        'message',
        'notifications'
    ];
    protected $casts = [
       'appoinment_date' => 'datetime',
       'activity' => 'datetime',
    ];

    function con_department(){
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }
    function con_doctor(){
        return $this->belongsTo(DoctorModel::class, 'doctor_id');
    }
}
