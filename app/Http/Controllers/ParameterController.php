<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParameterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['parameters'] = Parameter::all();
        return view('layouts.parameter.index', $data);
    }
    public function add(Request $request)
    {
        $param = new Parameter;
        $param->name = $request->name;
        $param->save();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Parameter::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $param = DB::table('parameters')->where('id', $request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();
    }


}
