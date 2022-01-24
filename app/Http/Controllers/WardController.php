<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['wards'] = Ward::all();
        return view('layouts.ward.index', $data);
    }

    public function add(Request $request)
    {
        $ward = new Ward;
        $ward->name = $request->name;
        $ward->save();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Ward::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $ward = DB::table('wards')->where('id', $request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();
    }

}
