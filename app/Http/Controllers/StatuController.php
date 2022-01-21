<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use Illuminate\Http\Request;

class StatuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['status'] = Statu::all();
        return view('layouts.statu.index', $data);
    }
}
