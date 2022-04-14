<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DuAn;
class DashboardController extends Controller
{
    public function index() {
    	$du_an = DuAn::find(1);
        return view('admin.dashboard.index',compact('du_an'));
    }

}
