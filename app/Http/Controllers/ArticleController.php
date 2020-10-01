<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function Show($id){
        $arts = DB::table('article_data')->get();
        if($id<=$arts->last()->articleId){
            $select = $arts->where('articleId','=',$id);
            $nextId = $arts->where('articleId','>',$id)->min("articleId");
            $previousId = $arts->where('articleId','<',$id)->max("articleId");
            //$userIn = DB::table('user_data')->get()->where('userId','=',$select->first()->authorId);
            return view('arts.artLayout',['id'=>$id,'thisArt'=>$select,'nextId'=>$nextId,'previousId'=>$previousId]);
        }
    }
}
