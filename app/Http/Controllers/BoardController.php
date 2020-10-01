<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function leave(Request $request){
        if ($request->isMethod('post')){
            if ($request['message'] == 'on'){
                return back();
            }
            if($request->input('check') == '隐藏'){
                DB::insert('insert into board_data (updateDate,user,message,id,secret) values (?,?,?,?,?)',
                    [null ,session('user'), $request["message"],null,'on']);
            }
            else{
                DB::insert('insert into board_data (updateDate,user,message,id,secret) values (?,?,?,?,?)',
                    [null ,session('user'), $request["message"],null,'off']);
            }
            return response()->json(['code'=>'success']);
        }else{
            $loading = DB::table('board_data')->latest('id')->get()->all();
            if (session('user') != 'rr' && session('user') !='loverr' && session('user') !='miiro'){
                foreach ($loading as $l){
                    if ($l->secret == 'on'){
                        $l->message = 'hidden';
                    }
                }
            }
            return view('board.boardPage',["loading"=>$loading]);
        }
    }

    public function login(Request $request){
        if ($request->isMethod('post')){
            $un = $request['un'];
            $admin = DB::table('guest_data')->where("guestName","like","$un%")->get()->first();
            $validate = \Illuminate\Support\Facades\Validator::make($request->input(),[
                "un"=>"required",
                "upw"=>"required",
            ],[
                "un.required"=>"用户名不能为空",
                "upw.required"=>"密码不能为空",
            ]);
            //
            if ($admin != null){
                if($validate->passes()){
                    session_start();
                    if ($request['vc'] == null) {
                        return back()->with('message', "验证码不能为空");
                    } elseif ($_SESSION['Checknum'] != $request['vc']) {
                        return back()->with('message', "验证码错误");
                    } elseif ($admin->guestName != $request['un']) {
                        return back()->with('message', "用户名错误");
                    } elseif ($admin->guestPw != $request['upw']) {
                        return back()->with('message', "密码错误");
                    }
                    session(['userpass'=>'pass']);
                    session(['user'=>$admin->guestName]);
                    return redirect('/board/message');
                }elseif ($validate->failed()){
                    return back()->with('message',$validate->errors()->first());
                }
            }
            else{
                return back()->with('message', "信息不存在");
            }
        }
        elseif ($request->isMethod('get')){
            return view('board.login');
        }
    }
}
