<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();
        return view('admin.users.users', compact('users'));
    }
    public function edit($id){
        $users = User::find($id);
        return response()->json($users);
    }
    public function update(Request $request)
    {
        $users = User::find($request->id);
        $users->name = $request->name1;
        $users->email = $request->email1;
        $users->user_type = $request->user_type1;
        $users->update();
        return response()->json($users);
    }
    public function passupdate(Request $request)
    {
        $users = User::find($request->id);
        $users->password = Hash::make($request->password1);
        $users->update();
        return response()->json($users);
    }
}
