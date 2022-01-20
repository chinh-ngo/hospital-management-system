<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $supervisors = DB::table('users')->where('role','engr')->get();
        $states = State::all();
        $projects = Project::all();
        return view('layouts.projects', ['supervisors' => $supervisors, 'states' => $states, 'projects' => $projects]);
    }

    public function showById(Request $request)
    {
        $supervisors = DB::table('users')->where('role','engr')->get();
        $states = State::all();
        $id = $request->id;
        $projects = Project::orderBy('id')->where('state_id', $id)->get();

        return view('layouts.projects', ['supervisors' => $supervisors, 'states' => $states, 'projects' => $projects]);
    }

    public function add(Request $request)
    {
        $project = new Project;
        $project->title = $request->title;
        $project->awarddate = $request->awardDate;
        $project->contractor = $request->contractor;
        $project->user_id = $request->supervisor;
        $project->state_id = $request->stateId;
        $project->objectives = $request->objectives;
        $project->percentcomplete = $request->completepercent;
        $project->retention = $request->retention;
        $project->commendate = $request->commenDate;
        $project->completedate = $request->completeDate;
        $project->direct = $request->direct;
        $project->indirect = $request->indirect;
        $project->induced = $request->induced;
        $project->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $project = DB::table('projects')
            ->where('id', $request->updateid)
            ->update(['title' => $request->updatetitle,
                'awarddate' => $request->updateawardDate,
                'contractor' => $request->updatecontractor,
                'user_id' => $request->updatesupervisor,
                'state_id' => $request->updatestateId,
                'objectives' => $request->updateobjectives,
                'percentcomplete' => $request->updatecompletepercent,
                'retention' => $request->updateretention,
                'commendate' => $request->updatecommenDate,
                'completedate' => $request->updatecompleteDate,
                'direct' => $request->updatedirect,
                'indirect' => $request->updateindirect,
                'induced' => $request->updateinduced,

            ]);
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        Project::findOrFail($request->id)->delete();
        return redirect()->back();
    }

}
