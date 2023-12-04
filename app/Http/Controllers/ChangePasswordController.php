<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{

    public function contra()
    {
        return view('auth.reset_password');
    }
}
