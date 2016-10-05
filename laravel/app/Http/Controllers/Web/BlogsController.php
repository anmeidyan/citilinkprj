<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\blogs;
use App\blogs_comments;
use DateTime;

class BlogsController extends Controller
{
    public function getblog($url){
        $blogs = blogs::where('url','=',$url)->first();
        $getblogs = blogs::orderby('created_at','DESC')->where('url','!=',$url)->get();
        $blogs_comments = blogs_comments::where('blogs_url','=',$url)->get();
        return view('web.blog',[
            'blogs' => $blogs,
            'getblogs' => $getblogs,
            'comments' => $blogs_comments
        ]);
    }

    public function postcomment(){
        $now = new DateTime;
        $id = Auth::user()->id;
        $name = Auth::user()->name;

        $comment = Input::get('comment');


    }

}
