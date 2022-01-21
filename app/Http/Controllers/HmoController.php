<?php

namespace App\Http\Controllers;

use App\Models\Hmo;
use Illuminate\Http\Request;

class HmoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['hmoes'] = Hmo::all();
        return view('layouts.hmo.index', $data);
    }
}
