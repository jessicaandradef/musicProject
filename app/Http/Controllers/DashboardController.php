<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return ['auth'];
    }

    public function dashboardPage() {

        $admin = User::TYPE_ADMIN;
        return view('users.dashboard_user', compact('admin'));
    }
}
