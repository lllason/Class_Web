<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hello2Controller extends Controller
{
    public function show_ctu2($param = ""){
        $ctu = "你好2 (From H2)" . $param;
        //第一種傳變數進view的方法
        return view('welcome2')->with('userCTU2',$ctu);
        //第二種方法
        //return view('welcome2',compact($ctu));
    }
}
