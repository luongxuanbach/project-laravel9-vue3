<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
}
