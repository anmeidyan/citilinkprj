<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\sliders;
use DateTime;

class SlidersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $sliders = sliders::all();
        return view('admin.sliders.index',[
          'sliders' => $sliders
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.sliders.create');
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
            'image'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {

            $now    = new DateTime();
            $image  = Input::get('image');
            $enab   = Input::get('enable');
            if(isset($enab)){
                $enable=1;
            }else{
                $enable=0;
            }

            $sliders = new sliders;
            $sliders->enable        = $enable;
            $sliders->image         = $image;
            $sliders->created_at    = $now;
            $sliders->save();

            return redirect('admin/sliders')->with('success', 'successfully created data');
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
        $sliders = sliders::find($id);
        // show the edit form
        return view('admin.sliders.edit',[
          'sliders' => $sliders
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
            'image'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
          $now = new DateTime();
          $slider = Input::get('image');
          $enab=Input::get('enable');
          if(isset($enab)){
              $enable=1;
          }else{
              $enable=0;
          }


          $sliders = sliders::find($id);
          $sliders->enable        = $enable;
          $sliders->image         = $slider;
          $sliders->updated_at    = $now;
          $sliders->save();


          return redirect('/admin/sliders')->with('success', 'successfully updated data');
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
       $sliders = sliders::find($id);
       $sliders->delete();

       // redirect
       return redirect('/admin/sliders')->with('success', 'successfully deleted data');
    }
}
