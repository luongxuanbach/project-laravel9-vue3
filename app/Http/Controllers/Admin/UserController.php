<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::
        join('departments', 'users.department_id', '=', 'departments.id')
        ->join('users_status', 'users.status_id', '=', 'users_status.id')
        ->select(
            'users.*',
            'departments.name as departments',
            'users_status.name as status')
        ->get();

        return response()->json($users);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function create() {
        $user_status = DB::table('users_status')
        ->select(
            "id as value",
            "name as label"
        )
        ->get();
        $department = DB::table('departments')->select(
            "id as value",
            "name as label"
        )
        ->get();

        return response()->json([
            "users_status" => $user_status,
            "department" => $department,
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'status_id' => "required",
            'username' => "required|unique:users,username",
            'name' => "required|max:255",
            'email' => "required|email",
            'department_id' => "required",
            'password' => "required|confirmed",
        ], [
            'status_id.required' =>  'Please enter status',

            'username.required' => "Please enter username",
            'username.unique' => "This account has already existed",

            'name.required' => "Please enter name",
            'name.max' => "Maximum input 255 characters",

            'email.required' => "Please enter email",
            'email.email' => "Invalid email",

            'department_id.required' => "Please enter department",

            'password.required' => "Please enter password",
            'password.confirmed' => "Confirm password do not match"
        ]);

        // User::create([
        //     'name' => 'London to Paris',
        // ]);

        // DB::table('users')->insert([
        //     'email' => 'kayla@example.com',
        //     'votes' => 0
        // ]);
    }
}
