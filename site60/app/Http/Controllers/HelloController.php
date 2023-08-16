<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Student;

class HelloController extends Controller
{
    public function show_ctu(){
        $ctu = "你好1 (From Hello)";
        //第一種傳變數進view的方法
        return view('welcome1')->with('userCTU',$ctu);
        //第二種方法
        //return view('welcome2',compact($ctu));
    }

    public function show_ctu3($you){
        $product = Product::find($you);
        $ctu = "品名: ".$product->name;
        $ctu2 = " Summary".$product->detail;
        //第一種傳變數進view的方法
        //return view('welcome2')->with('userCTU',$ctu);
        //第二種方法
        return view('welcome2',compact('ctu','ctu2','you'));
    }    

    public function show_ctu4($id){
        $product = Student::find($id);
        $ctu = "姓名: ".$product->name;
        $ctu2 = $product->address;
        //第一種傳變數進view的方法
        //return view('welcome2')->with('userCTU',$ctu);
        //第二種方法
        return view('welcome3',compact('ctu','ctu2','id'));
    }    

}