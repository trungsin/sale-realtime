<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DuAn;
class DuAnController extends Controller
{
    public function index() {
    	$du_ans = DuAn::all();
        return view('admin.du-an.index',compact('du_ans'));
    }

    public function show($id) {
    	$du_an = DuAn::find($id);
        return view('admin.du-an.show',compact('du_an'));
    }

}
