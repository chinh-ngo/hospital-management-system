<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $zones = Zone::all();
        $states = State::all();
        return view('layouts.states', ['zones' => $zones, 'states' => $states]);
    }

    public function add(Request $request)
    {
        $state = new State;
        $state->name = $request->stateName;
        $state->zone_id = $request->zoneId;
        $state->save();
        return redirect()->back();
    }

    public function showById(Request $request)
    {
        $zones = Zone::all();
        $states = State::orderBy('id')->where('zone_id', $request->id)->get();
        return view('layouts.states', ['zones' => $zones, 'states' => $states]);

    }

    public function update(Request $request)
    {
        $state = DB::table('states')
            ->where('id', $request->updateStateId)
            ->update(['name' => $request->updateStateName]);
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        State::findOrFail($request->id)->delete();
        return redirect()->back();
    }

}
