<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['insurances'] = Insurance::all();
        return view('layouts.insurance.index', $data);
    }
    public function add(Request $request)
    {
        $insurance = new Insurance;
        $insurance->name = $request->name;
        $insurance->save();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Insurance::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        Insurance::find($request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();

    }
}