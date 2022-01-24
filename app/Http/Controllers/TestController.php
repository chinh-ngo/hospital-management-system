<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['tests'] = Test::all();
        return view('layouts.test.index', $data);
    }
    public function add(Request $request)
    {
        $test = new Test;
        $test->name = $request->name;
        $test->amount = $request->amount;
        $test->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Test::findOrFail($request->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $test = DB::table('tests')->where('id', $request->id)->update([
            'name' => $request->update_name,
            'amount' => $request->update_amount
        ]);
        return redirect()->back();
    }
}
