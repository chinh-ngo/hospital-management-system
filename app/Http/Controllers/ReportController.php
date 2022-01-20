<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reports = Report::all();
        return view('layouts.report', ['reports' => $reports]);
    }
    public function add()
    {
        return view('layouts.reportlayout.add');
    }

    public function get_update(Request $request)
    {
        $report = Report::orderBy('id')->where('id', $request->id)->first();
        return view('layouts.reportlayout.update', ['report' => $report]);
    }

    public function post_update(Request $request)
    {
        $report = DB::table('reports')
            ->where('id', $request->reportid)
            ->update([
                'visit_date' => $request->visitDate,
                'project_location' => $request->projectLocation,
                'percentage_completion' => $request->percentage,
                'challenges' => $request->challenges,
                'supervisor_division' => $request->superDivision,
                'supervision_location' => $request->superLocation,
                'impact_project' => $request->impactProject,
                'zonal_comment' => $request->zonalComment,
                'divisional_comment' => $request->divisionalComment,
                'hod_comment' => $request->hodComment
                ]);
        return redirect("reports");
    }

    public function post_add(Request $request)
    {
        $report = new Report;
        if($request->hasFile('uploadDoc')) {
            $docname = $request->file('uploadDoc');
            $doc_save_name = time().'.'.$docname->getClientOriginalExtension();
            $destinationPath = public_path('/uploadFiles');
            $docname->move($destinationPath, $doc_save_name);

            $report->upload_document = $doc_save_name;
        }

        $report->user_id = auth()->user()->id;
        $report->visit_date = $request->visitDate;
        $report->project_location = $request->projectLocation;
        $report->percentage_completion = $request->percentage;
        $report->challenges = $request->challenges;
        $report->recommendations = $request->recommendations;
        $report->supervisor_division = $request->superDivision;
        $report->supervision_location = $request->superLocation;
        $report->impact_project = $request->impactProject;
        $report->zonal_comment = $request->zonalComment;
        $report->divisional_comment = $request->divisionalComment;
        $report->hod_comment = $request->hodComment;

        $report->save();
        return redirect("reports");
    }


    public function delete(Request $request)
    {
        Report::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
