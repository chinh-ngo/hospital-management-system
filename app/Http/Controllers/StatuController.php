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
    public function add(Request $request)
    {
        $statu = new Statu;
        $statu->name = $request->name;
        $statu->save();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        Statu::find($request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Statu::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
