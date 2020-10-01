<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /*admin login*/
    public function login(Request $request){
        if ($request->isMethod('post')){
            $admin = DB::table('admin_data')->get()->first();
            $validate = \Illuminate\Support\Facades\Validator::make($request->input(),[
                "un"=>"required",
                "upw"=>"required",
            ],[
                "un.required"=>"用户名不能为空",
                "upw.required"=>"密码不能为空",
            ]);
            //
            if($validate->passes()){
                session_start();
                if ($request['vc'] == null) {
                    return back()->with('message', "验证码不能为空");
                } elseif ($_SESSION['Checknum'] != $request['vc']) {
                    return back()->with('message', "验证码错误");
                } elseif ($admin->name != $request['un']) {
                    return back()->with('message', "用户名错误");
                } elseif ($admin->pw != $request['upw']) {
                    return back()->with('message', "密码错误");
                }
                session(['adminpass'=>'pass']);
                return redirect('/art/make');
            }elseif ($validate->failed()){
                return back()->with('message',$validate->errors()->first());
            }
        }
        elseif ($request->isMethod('get')){
            return view('cabin.login');
        }
    }
    /*admin article make*/
    public function ArtMake(Request $request){
        if ($request->isMethod('post')){
            if ($request['artImg'] != null){
                $fileImg = $request->file('artImg');
                $ext = $fileImg->getClientOriginalExtension();
                $path = $fileImg->getRealPath();
                $fileName = $fileImg->getFilename().'.'.$ext;
                $title = $request['artTitle'];
                $sum = $request['artSum'];
                $contains = $request['artContains'];
                $tags = $request['artTags'];
                Storage::disk('artImg')->put($fileName,file_get_contents($path));
                //Img path
                $ImgPath = '/article/img/'.$fileName;
                DB::insert('insert into article_data
                (articleId,articleTitle,articleCon,articleImg,articleDate,authorId,articleTags,articleSum,articlePure)
                values (?,?,?,?,?,?,?,?,?)',[null,$title,$contains,$ImgPath,null,'1',$tags,$sum,$request['cons']]);
                return view('layouts.success');
            }else{
                dd("no");
            }
        }elseif ($request->isMethod('get')){
            return view('arts/artMake');
        }
    }
}
