<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('layouts.user', ['users' => $users]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phoneNum' => 'required',
            'email' => 'required|email',
            'pwd' => 'required|min:6',
            'role' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect()->back();
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['pwd']),
            'phonenum' => $data['phoneNum'],
            'role' => $data['role']
        ]);
    }

    public function delete(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return redirect('users');
    }
    public function update(Request $request)
    {
        $user = DB::table('users')
            ->where('id', $request->updateUserId)
            ->update(['name' => $request->updateUserName,
                      'email' => $request->updateUserEmail,
                      'phonenum' => $request->updateUserPhone,
                      'role' => $request->updateUserRole,

                ]);
        return redirect("users");
    }
}
