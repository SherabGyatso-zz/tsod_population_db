<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminV2;

class AdminV2Controller extends Controller
{
    //

    public function index() {
        $admins = AdminV2::all();
        return view('adminv2.index', ['admins' => $admins]);
    }

}
