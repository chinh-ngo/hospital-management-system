<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Project;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $states = State::all();
        $projects = Project::all();
        $finances = Finance::all();
        return view('layouts.finance', ['states' => $states, 'projects' => $projects, 'finances' => $finances]);
    }

    public function add(Request $request)
    {
        $finance = new Finance;
        $finance->project_id = $request->project;
        $finance->contract_sum = $request->contract;
        $finance->amount = $request->amount;

        $finance->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Finance::findOrFail($request->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $finance = DB::table('finances')
            ->where('id', $request->updateid)
            ->update(['project_id' => $request->updateproject,
                'contract_sum' => $request->updatecontract,
                'amount' => $request->updateamount,

            ]);
        return redirect()->back();
    }
}
