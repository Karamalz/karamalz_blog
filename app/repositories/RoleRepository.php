<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class RoleRepository{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function checkRoleInit($id)
    {
        Role::firstOrCreate(
            ['uid' => $id],
            ['roles' => 'normal',
            'description' => 'no special']
        );
        return;
    }

    public function findRole($id)
    {
        Role::where('uid', $id)->get();
    }

    public function upgrade($id)
    {
        Role::where('uid', $id)->update(['roles' => 'admin']);
    }

    public function downgrade($id)
    {
        Role::where('uid', $id)->update(['roles' => 'normal']);
    }

}