<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function show()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.admin.users', [
            'users' => $users
        ]);
    }
}
