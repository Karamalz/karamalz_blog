<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        return view('role');
    }

    public function create()
    {
        $role = new Role();
        $role->uid = Auth::user()->id;
        $role->roles = 'normal';
        $role->description = 'normal';
        $role->save();
        return redirect('/home');
    }
}
