<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\cars;
use DateTime;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = cars::all();
        return view('admin.cars.index',[
          'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
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
            'type_id' => 'required',
            'name'    => 'required',
            'trans'    => 'required',
            'gas'    => 'required',
            'image'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {

            $now    = new DateTime();
            $type  = Input::get('type_id');
            $name  = Input::get('name');
            $trans  = Input::get('trans');
            $gas  = Input::get('gas');
            $image  = Input::get('image');

            $cars = new cars;
            $cars->type_id      = $type;
            $cars->name         = $name;
            $cars->transmition  = $trans;
            $cars->gas          = $gas;
            $cars->image        = $image;
            $cars->created_at   = $now;
            $cars->save();

            return redirect('admin/cars')->with('success', 'successfully created data');
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
        $cars = cars::find($id);
        // show the edit form
        return view('admin.cars.edit',[
          'cars' => $cars
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
            'type_id'  => 'required',
            'name'    => 'required',
            'trans'    => 'required',
            'gas'    => 'required',
            'image'    => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {

            $now    = new DateTime();
            $type  = Input::get('type_id');
            $name  = Input::get('name');
            $trans  = Input::get('trans');
            $gas  = Input::get('gas');
            $image  = Input::get('image');

            $cars = cars::find($id);
            $cars->type_id     = $type;
            $cars->name        = $name;
            $cars->transmition = $trans;
            $cars->gas        = $gas;
            $cars->image         = $image;
            $cars->updated_at    = $now;
            $cars->save();

            return redirect('admin/cars')->with('edit', 'successfully edited data');
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
       $cars = cars::find($id);
       $cars->delete();

       // redirect
       return redirect('/admin/cars')->with('delete', 'successfully deleted data');
    }
}
