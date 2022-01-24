<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['appointments'] = Appointment::all();
        $data['users'] = User::all();
        return view('layouts.appointment.index', $data);
    }

    public function add(Request $request)
    {
        $appointment = new Appointment;
        $appointment->user_id = $request->user_id;
        $appointment->reason = $request->reason;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->room = $request->room;
        $appointment->save();

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
        Appointment::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
