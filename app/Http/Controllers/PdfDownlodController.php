<?php

namespace App\Http\Controllers;

use App\Models\AppoinmentModel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfDownlodController extends Controller
{
    function appointment_pdf($id){
        $appointment = AppoinmentModel::where('id',$id)->first();
        $payment = DB::table('orders')->where('order_id',$appointment->order_id)->first()->status;
        $data = [
            'appointment' => $appointment,
            'payment' => $payment,
        ];

        $pdf = Pdf::loadView('pdf.appointment', ['data' => $data]);
        return $pdf->stream();
    }
}
