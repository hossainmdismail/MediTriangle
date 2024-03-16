<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\StateModel;
use App\Models\CountryModel;
use Illuminate\Http\Request;
use App\Models\HospitalModel;
use App\Models\DepartmentModel;
use App\Models\SpecialityModel;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class DatabaseController extends Controller
{
    //Country Link
    function country(){
        $data = CountryModel::where('status',1)->paginate(8);

        if (Auth::guard('admin_model')->user()->can('database')) {
            return view('backend.database.country',['datas' => $data]);
            // Show the view page
        } else {
            return abort(404);
        }

    }
    function countryStore(Request $request){
        $request->validate([
            'country' => 'required',
        ]);
        if (CountryModel::where('country',$request->country)->exists()) {
            return back()->with('err','Data already exists');;
        }else {
        CountryModel::insert([
            'country' => $request->country,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ','Country Successfully Added.');
        }

    }
    function countryDelete($id){
        $country = CountryModel::where('id',$id)->first();
        StateModel::where('country_id',$country->id)->delete();
        HospitalModel::where('country_id',$country->id)->delete();
        DepartmentModel::where('country_id',$country->id)->delete();
        CountryModel::find($id)->delete();
        return back()->with('succ', 'Successfully Removed');
    }
    function countryUpdate(Request $request){
        CountryModel::where('id',$request->id)->update([
            'country' => $request->country,
        ]);
        return back()->with('succ', 'Update Successfully');
    }

    //State Link
    function state(){
        $data = StateModel::where('status',1)->paginate(8);
        $country = CountryModel::where('status',1)->get();
        if (Auth::guard('admin_model')->user()->can('database')) {
            return view('backend.database.state',['datas' => $data,'countries' => $country]);
            // Show the view page
        } else {
            return abort(404);
        }

    }
    function stateStore(Request $request){
        $request->validate([
            'country_id' => 'required',
            'state' => 'required',
        ]);
        if (StateModel::where('country_id',$request->country_id)->where('state',$request->state)->exists()) {
            return back()->with('err','Data already exists');;
        }else {
        StateModel::insert([
            'country_id' => $request->country_id,
            'state' => $request->state,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ','State Successfully Added.');
        }

    }
    function stateDelete($id){
        $country = StateModel::where('id',$id)->first();
        HospitalModel::where('state_id',$country->id)->delete();
        DepartmentModel::where('state_id',$country->id)->delete();
        StateModel::find($id)->delete();
        return back()->with('succ', 'Successfully Removed');
    }
    function stateUpdate(Request $request){
        StateModel::where('id',$request->id)->update([
            'state' => $request->state,
        ]);
        return back()->with('succ', 'Update Successfully');
    }


    //Hospital Link
    function hospital(){
        $data = HospitalModel::where('status',1)->paginate(8);
        $country = CountryModel::where('status',1)->get();
        if (Auth::guard('admin_model')->user()->can('database')) {
            return view('backend.database.hospital',['datas' => $data,'countries' => $country]);
            // Show the view page
        } else {
            return abort(404);
        }

    }
    function hospitalStore(Request $request){
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'hospital' => 'required',
        ]);
        if (HospitalModel::where('country_id',$request->country_id)->where('state_id',$request->state_id)->where('hospital',$request->hospital)->exists()) {
            return back()->with('err','Data already exists');;
        }else {
         HospitalModel::insert([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'hospital' => $request->hospital,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ','Country Successfully Added.');
        }

    }
    function hospitalAjax(Request $request){
        $country = '<option value="">-- Select State --</option>';
        foreach (StateModel::where('country_id',$request->country_id)->get() as  $value) {
            $country .= '<option value="'.$value->id.'">'.$value->state.'</option>';
        }
        return $country;
    }
    function hospitalDelete($id){
        $country = HospitalModel::where('id',$id)->first();
        DepartmentModel::where('hospital_id',$country->id)->delete();
        HospitalModel::find($id)->delete();
        return back()->with('succ', 'Successfully Removed');
    }
    function hospitalUpdate(Request $request){
        HospitalModel::where('id',$request->id)->update([
            'hospital' => $request->hospital,
        ]);
        return back()->with('succ', 'Update Successfully');
    }

    //department Link
    function department(){
        $sp = SpecialityModel::where('status',1)->paginate(8);
        $data = DepartmentModel::where('status',1)->paginate(8);
        if (Auth::guard('admin_model')->user()->can('database')) {
            return view('backend.database.department',['datas' => $data,'sps' => $sp]);
            // Show the view page
        } else {
            return abort(404);
        }

    }
    function departmentStore(Request $request){
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'hospital_id' => 'required',
            'department' => 'required',
        ]);
        if (DepartmentModel::where('country_id',$request->country_id)->where('state_id',$request->state_id)->where('hospital_id',$request->hospital_id)->where('department',$request->department)->exists()) {
            return back()->with('err','Data already exists');;
        }else {
            DepartmentModel::insert([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'hospital_id' => $request->hospital_id,
            'department' => $request->department,
            'created_at' => Carbon::now(),
            ]);
            return back()->with('succ','department Successfully Added.');
        }

    }
    function departmentAjax(Request $request){
        $state = '<option value="">-- Select Hospital --</option>';
        foreach (HospitalModel::where('state_id',$request->state_id)->get() as  $value) {
            $state .= '<option value="'.$value->id.'">'.$value->hospital.'</option>';
        }
        return $state;
    }
    function departmentDelete($id){
        $department = DepartmentModel::where('id',$id)->first();
        // DepartmentModel::where('hospital_id',$country->id)->delete();
        $department->delete();
        return back()->with('succ', 'Successfully Removed');
    }
    function departmentUpdate(Request $request){
        DepartmentModel::where('id',$request->id)->update([
            'department' => $request->department,
        ]);
        return back()->with('succ', 'Update Successfully');
    }

    //speciality Link
    function specialityStore(Request $request){
        $request->validate([
            'speciality' => 'required',
        ]);
        if (SpecialityModel::where('speciality',$request->speciality)->exists()) {
            return back()->with('err','Data already exists');
        }else {
         SpecialityModel::insert([
            'speciality' => $request->speciality,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ','speciality Successfully Added.');
        }

    }
    function specialityDelete($id){
        SpecialityModel::find($id)->delete();
        return back()->with('succ','Successfully Deleted!');
    }

}
