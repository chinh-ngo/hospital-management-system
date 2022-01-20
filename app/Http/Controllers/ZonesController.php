<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZonesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $zones = Zone::all();
        return view('layouts.zones', ['zones' => $zones]);
    }

    public function add(Request $request)
    {
        $zone = new Zone;
        $zone->zone = $request->zoneName;
        $zone->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Zone::findOrFail($request->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $zone = DB::table('zones')
            ->where('id', $request->updateZoneId)
            ->update(['zone' => $request->updateZoneName]);
        return redirect()->back();
    }
}
