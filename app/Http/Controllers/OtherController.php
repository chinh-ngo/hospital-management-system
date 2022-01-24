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
    public function add(Request $request)
    {
        $other = new Other;
        $other->name = $request->name;
        $other->amount = $request->amount;
        $other->save();
        return redirect()->back();

    }
    public function delete(Request $request)
    {
        Other::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        Other::find($request->id)->update([
            'name' => $request->update_name,
            'amount' => $request->update_amount
        ]);
        return redirect()->back();
    }
}
