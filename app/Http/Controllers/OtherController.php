<?php

namespace App\Http\Controllers;

use App\Models\Other;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['others'] = Other::all();
        return view('layouts.other.index', $data);
    }
}
