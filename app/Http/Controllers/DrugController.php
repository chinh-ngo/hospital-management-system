<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['drugs'] = Drug::all();
        $data['categories'] = Category::all();
        return view('layouts.drug.index', $data);
    }

    public function category()
    {
        $data['categories'] = Category::all();
        return view('layouts.drug.category', $data);
    }
}
