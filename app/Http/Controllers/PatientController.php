<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['patients'] = Patient::all();
        $data['insurances'] = Insurance::all();
        return view('layouts.patient.index', $data);
    }

    public function add(Request $request)
    {
        $patient = new Patient;
        $patient->card_num = $request->card_num;
        $patient->state = $request->state;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->insurance_id = $request->insurance;
        $patient->address = $request->address;
        $patient->phone_num = $request->phone_num;
        $patient->email = $request->email;
        $patient->king_phone = $request->king_phone;
        $patient->blood_g = $request->blood;

        if($request->hasFile('patient_avatar')) {
            $docname = $request->file('patient_avatar');
            $doc_save_name = time().'.'.$docname->getClientOriginalExtension();
            $destinationPath = public_path('/uploadFiles/patients');
            $docname->move($destinationPath, $doc_save_name);

            $patient->upload_file = $doc_save_name;
        }

        $patient->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $appointment = DB::table('appointments')
            ->where('id', $request->id)
            ->update([
                'user_id' => $request->update_user_id,
                'reason' => $request->update_reason,
                'date' => $request->update_date,
                'time' => $request->update_time,
                'room' => $request->update_room
            ]);
        return redirect()->back();
    }
    public  function delete(Request $request)
    {
        $patient = Patient::findOrFail($request->id);
        $image_path = "uploadFiles/patients/".$patient->upload_file;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $patient->delete();
        return redirect()->back();
    }
}
