<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['departments'] = Department::all();
        return view('layouts.department.index', $data);
    }
    public function add(Request $request)
    {
        $department = new Department;
        $department->name = $request->name;
        $department->save();
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Department::findOrFail($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        Department::find($request->id)->update([
            'name' => $request->update_name
        ]);
        return redirect()->back();
    }


}
