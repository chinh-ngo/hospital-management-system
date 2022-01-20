<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use App\Models\State;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectTeamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $projects = Project::all();
        $states = State::all();
        $users = User::all();
        $teams = Team::all();

        return view('layouts.projectteam', ['projects' => $projects, 'states' => $states, 'users' => $users, 'teams' => $teams]);
    }

    public function add(Request $request)
    {
        $team = new Team;
        $team->project_id = $request->project;
        $team->state_id = $request->state;
        $count = count($request->members);
        $team->save();

        for ($i = 0; $i < $count; $i++){
            $member = new Member;
            $member->team_id = $team->id;
            $member->user_id = $request->members[$i];
            $member->save();
        }
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Team::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $team = DB::table('teams')
            ->where('id', $request->updateid)
            ->update([
                'project_id' => $request->updateproject,
                'state_id' => $request->updatestate,
            ]);


        $count = count($request->updatemembers);

        Member::where('team_id', $request->updateid)->delete();

        for ($i = 0; $i < $count; $i++){
            $member = new Member;
            $member->team_id = $request->updateid;
            $member->user_id = $request->updatemembers[$i];
            $member->save();
        }
        return redirect()->back();
    }

}
