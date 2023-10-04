<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(Role $role)
    {
        $users_with_role = $role->users()->get();
        $role_name = $role->name;
        return Inertia::render('Users/Roles', [
            'role_name' => $role_name,
            'users' => $users_with_role,
        ]);
    }
}
