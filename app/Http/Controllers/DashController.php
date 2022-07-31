<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function usershow()
    {
        $users = User::all();
        return view('admin.user.user',[
            'users' => $users
        ]);
    }
}
