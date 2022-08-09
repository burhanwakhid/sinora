<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function test()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'all access']);
        $user = User::find(auth()->id());

        $user->assignRole('admin');
    }
}
