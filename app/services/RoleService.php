<?php

namespace App\services;

use App\repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleService
{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function initRole($id)
    {
        $this->roleRepo->upgrade($id);
        return;
    }

    public function upgradeRole($id)
    {
        $this->roleRepo->setInitRole($id);
        return;
    }

    public function downgradeRole($id)
    {
        $this->roleRepo->downgrade($id);
        return;
    }

}