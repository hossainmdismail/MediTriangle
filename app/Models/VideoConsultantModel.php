<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoConsultantModel extends Model
{
    use HasFactory;

     protected $fillable =[
        'status',
        'order_status',
        'appointment_date',
        'message',
        'notification'
    ];
    protected $casts = [
       'expected_date' => 'datetime',
       'appointment_date' => 'datetime',
    ];

     function con_doctor(){
        return $this->belongsTo(DoctorModel::class, 'doctor_id');
    }

}
