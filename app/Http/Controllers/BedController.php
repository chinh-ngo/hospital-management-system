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
    public function add(Request $request)
    {
        $bed = new Bed;
        $bed->no = $request->bed_num;
        $bed->ward_id = $request->ward_id;
        $bed->save();
        return redirect()->back();

    }
    public function update(Request $request)
    {
        $bed = Bed::find($request->id)->update([
            'no' => $request->update_bed_num,
            'ward_id' => $request->update_ward_id
        ]);
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Bed::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
