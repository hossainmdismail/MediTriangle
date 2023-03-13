<?php

namespace App\Http\Controllers;

use App\Models\MedicineBillings;
use App\Models\MedicineOrder;
use Illuminate\Http\Request;

class AdminMedicineController extends Controller
{
    function link(){
        $data = MedicineBillings::paginate(10);
        return view('backend.medicine.index',['datas' => $data]);
    }
}
