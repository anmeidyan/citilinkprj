<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\blogs;
use DateTime;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blogs::all();
        return view('admin.blogs.index',[
          'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'url'       => 'required|unique:blogs',
            'image'     => 'required',
            'title'     => 'required',
            'desc'      => 'required',
            'content'   => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {

            $now    = new DateTime();
            $url  = Input::get('url');
            $image  = Input::get('image');
            $title  = Input::get('title');
            $desc   = Input::get('desc');
            $content   = Input::get('content');
            $enab   = Input::get('enable');
            if(isset($enab)){
                $enable=1;
            }else{
                $enable=0;
            }

            $blogs = new blogs;
            $blogs->enable        = $enable;
            $blogs->url           = $url;
            $blogs->image         = $image;
            $blogs->title         = $title;
            $blogs->description   = $desc;
            $blogs->content       = $content;
            $blogs->created_at    = $now;
            $blogs->save();

            return redirect('admin/blogs')->with('success', 'successfully created data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = blogs::find($id);
        // show the edit form
        return view('admin.blogs.edit',[
          'blogs' => $blogs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = [
            'url'       => 'required',
            'image'     => 'required',
            'title'     => 'required',
            'desc'      => 'required',
            'content'   => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {

            $now    = new DateTime();
            $url  = Input::get('url');
            $image  = Input::get('image');
            $title  = Input::get('title');
            $desc   = Input::get('desc');
            $content   = Input::get('content');
            $enab   = Input::get('enable');
            if(isset($enab)){
                $enable=1;
            }else{
                $enable=0;
            }

            $blogs = blogs::find($id);
            $blogs->enable        = $enable;
            $blogs->url           = $url;
            $blogs->image         = $image;
            $blogs->title         = $title;
            $blogs->description   = $desc;
            $blogs->content       = $content;
            $blogs->updated_at    = $now;
            $blogs->save();

            return redirect('admin/blogs')->with('edit', 'successfully edited data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
       $blogs = blogs::find($id);
       $blogs->delete();

       // redirect
       return redirect('/admin/blogs')->with('delete', 'successfully deleted data');
    }
}
