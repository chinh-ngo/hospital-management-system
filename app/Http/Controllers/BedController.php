<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Ward;
use Illuminate\Http\Request;

class BedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['wards'] = Ward::all();
        $data['beds'] = Bed::all();
        return view('layouts.bed.index', $data);
    }
}
