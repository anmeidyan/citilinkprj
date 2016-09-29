<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DateTime;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $slider = DB::table('slider')->get();
        return view('admin.slider.slider')
        ->with('slider',$slider);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.slider.slider-add');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store()
    {
        $now = new DateTime();
        $slider = Input::get('slider_img');

        $enab=Input::get('enable');
        if(isset($enab)){
            $enable=1;
        }else{
            $enable=0;
        }

        $rules = [
            'slider_img'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            // dd($validator->errors()->all());

        } else {
            DB::table('slider')->insert([
                'slider_img' => $slider,
                'slider_enable' => $enable,
                'created_at' => $now,
            ]);

            return redirect('/admin/slider')->with('success-addslider', 'Success Add Slider');
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
        $slider = DB::table('slider')->where('slider_id',$id)->first();
        return view('admin.slider.slider-detail')
        ->with('slider',$slider);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update()
    {
        $now = new DateTime();
        $id = Input::get('slider_id');
        $slider = Input::get('slider_img');

        $enab=Input::get('enable');
        if(isset($enab)){
            $enable=1;
        }else{
            $enable=0;
        }

        $rules = [
            'slider_img'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            // dd($validator->errors()->all());

        } else {
            DB::table('slider')->where('slider_id',$id)->update([
                'slider_img' => $slider,
                'slider_enable' => $enable,
                'updated_at' => $now,
            ]);

            return redirect('/admin/slider')->with('success-editslide', 'Success Edit Slider');
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
        //
    }
}
