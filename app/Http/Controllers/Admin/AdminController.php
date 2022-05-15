<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $user_role = User::find($user_id);
        // dd($user_role);
        foreach($user_role->roles as $role){
            echo $role->pivot->user_id;
        }
        // return view('admin.index');
    }
}
