<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //miiro.me主页面
    public function Index(Request $request){
        if ($request->isMethod('post')){
            /*
            //接受搜索
            $searchGet = $request['search'];
            //分页用
            $artPag = DB::table('article_data')->where('articleTitle','like',"$searchGet%")->
            latest('articleId')->paginate(5);
            //全部文章
            $art = DB::table('article_data')->latest('articleId')->get()->all();
            return view('main',['art'=>$art,'searchGet'=>$searchGet,'aP'=>$artPag]);*/
            $times = $database = DB::table('webBasic')->where('id', '=','1')->first()->visitTimes;
            DB::update('update webBasic set visitTimes=? where id=1',[$times+1]);
            return response()->json(['code'=>'success','aData'=>$request["time"],'local'=>$request['local']]);
        }
        elseif ($request->isMethod('get')){
            $searchGet = $request['search'] ;
            $artPag = DB::table('article_data')->where('articleTitle','like',"$searchGet%")->
            latest('articleId')->paginate(5);
            $art = DB::table('article_data')->latest('articleId')->get()->all();

            //统计浏览量
            $visit = DB::table('webBasic')->where('id', '=','1')->first();
            return view('main',['art'=>$art,'searchGet'=>$searchGet,'aP'=>$artPag,'visit'=>$visit]);
        }
    }
    public function fonts(Request $request){
        if ($request->isMethod('post')){
            //dd($request['check']);
            if ($request['text'] == 'on'){
                return back();
            }
            if(in_array('on',$request->input())){
                DB::insert('insert into board_data (updateDate,user,message,id,secret) values (?,?,?,?,?)',
                    [null ,session('user'), $request["message"],null,'on']);
            }
            else{
                DB::insert('insert into board_data (updateDate,user,message,id,secret) values (?,?,?,?,?)',
                    [null ,session('user'), $request["message"],null,'off']);
            }
        }else if ($request->isMethod('get')){
            $loading = DB::table('board_data')->latest('id')->get()->all();
            foreach ($loading as $l){
                if ($l->secret == 'on'){
                    $l->message = 'hidden';
                }
                //dd($l);
            }
            return view('fonts',["loading"=>$loading]);
        }
    }
    public function coo(Request $request){
        if ($request->isMethod('post')){
            $times = $database = DB::table('webBasic')->where('id', '=','0')->first()->visitTimes;
            DB::update('update webBasic set visitTimes=? where id=0',[$times+1]);
            return response()->json(['code'=>'success','aData'=>$request["time"],'local'=>$request['local']]);
        }else{
            $database = DB::table('webBasic')->where('id', '=','0')->first();
            return view('cookie',['visit'=>$database]);
        }
    }
}
