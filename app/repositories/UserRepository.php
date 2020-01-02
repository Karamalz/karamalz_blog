<?php

namespace App\Repositories;

use DB;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UserRepository{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = DB::table('users')
            ->select('users.id', 'name', 'roles', 'description')
            ->join('roles', 'users.id', '=', 'roles.uid')
            ->orderBy('users.id')
            ->get();
        return $users;
    }

}