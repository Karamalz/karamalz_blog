<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleRepository{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function setInitRole($id)
    {
        Role::create([
            'uid' => $id,
            'roles' => 'normal',
            'description' => 'no special',
        ]);
    }

}