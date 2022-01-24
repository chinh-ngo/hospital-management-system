<?php

namespace App\Http\Controllers;

use App\Models\Hmo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function add(Request $request)
    {
        $hmo = new Hmo;
        $hmo->name = $request->name;
        $hmo->phone_num = $request->phone_num;
        $hmo->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Hmo::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $hmo = DB::table('hmos')->where('id', $request->id)->update([
            'name' => $request->update_name,
            'phone_num' => $request->update_phone_num
        ]);
        return redirect()->back();
    }
}
