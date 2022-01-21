<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function add()
    {
        return view('layouts.appointment.add');
    }

    public function insert(Request $request)
    {

    }
}
