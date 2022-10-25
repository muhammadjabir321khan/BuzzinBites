<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admincontyroller extends Controller
{
    public function login()
    {
        return view('admin.login_form');
    }

    
    public function store(Request $req)
    {
        $check = $req->all();
        if (!Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect('admin/admin_dashboard');
        }
    }
}
