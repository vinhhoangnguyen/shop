<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    //Setting_Thông tin shop
    public function setting(){
        return view('backend.admin.pos.setting');
    }

    //Setting_Thông tin shop
    public function category(){
        // dd("Category");
        return view('backend.admin.pos.category');
    }
}
