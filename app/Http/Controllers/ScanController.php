<?php

namespace App\Http\Controllers;

use App\Models\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['scans'] = Scan::all();
        return view('layouts.scan.index', $data);
    }
    public function add(Request $request)
    {
        $scan = new Scan;
        $scan->name = $request->name;
        $scan->save();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Scan::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $scan = DB::table('scans')->where('id', $request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();
    }
}
