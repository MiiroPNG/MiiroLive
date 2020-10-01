<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(){
        return view('layouts.success');
    }
    public function test2(Request $request){
        if($request->isMethod('post')){
            return response()->json(['code'=>'success']);
        }else
        return view('ajax');
    }
}
