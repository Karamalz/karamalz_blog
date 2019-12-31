<?php

namespace App\Http\Controllers;

use App\services\RoleService;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    
    public function roleUpgrade() 
    {
        $this->roleService->upgradeRole();
        return view('admin');
    }

    public function roleDowngrade()
    {
        $this->roleService->downRole();
        return view('admin');
    }
    
}
