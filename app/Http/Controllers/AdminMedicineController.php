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

    function medicineWatch($id){
        MedicineBillings::find($id)->update([
            'status'  =>  1,
        ]);
        $data = MedicineBillings::where('id',$id)->first();
       return view('backend.medicine.watch',[
        'data'   =>  $data,
        ]);
    }

}
