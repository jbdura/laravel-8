<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = $user->all();
        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    public function user_roles(User $user)
    {
        $roles = $user->roles()->get();
        $user_name = $user->name;
        return Inertia::render('Users/UserRoles', [
            'user_name' => $user_name,
            'roles' => $roles,
        ]);
    }
}
