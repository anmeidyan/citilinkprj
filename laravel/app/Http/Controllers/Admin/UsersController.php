<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\users;
use Hash;
use DateTime;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::all();
        return view('admin.users.index',[
          'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        $name = Input::get('name');
        $email = Input::get('email');
        $pass = Input::get('password');
        $pass_confirm = Input::get('password_confirm');
        $level = Input::get('level');

        $rules = [
            'name'              => 'required|unique:users',
            'email'             => 'required|unique:users|email',
            'password'          => 'required',
            'password_confirm'  => 'required|same:password',
            'level'             => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            // dd($validator->errors()->all());

        } else {

            $users = new users;
            $users->name            = $name;
            $users->email           = $email;
            $users->password        = Hash::make($pass);
            $users->level           = $level;
            $users->created_at      = $now;
            $users->save();

            return redirect('/admin/users')->with('success-adduser', 'successfully created data');
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
        $users = users::find($id);
        // show the edit form
        return view('admin.users.edit',[
          'users' => $users
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
        $now = new DateTime();
        $name = Input::get('name');
        $email = Input::get('email');
        $pass = Input::get('password');
        $pass_confirm = Input::get('password_confirm');
        $level = Input::get('level');

        $rules = [
            'name'              => 'required|',
            'email'             => 'required|email',
            'password'          => 'required',
            'password_confirm'  => 'required|same:password',
            'level'             => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            // dd($validator->errors()->all());

        } else {

            $users = users::find($id);
            $users->name            = $name;
            $users->email           = $email;
            $users->password        = Hash::make($pass);
            $users->level           = $level;
            $users->updated_at      = $now;
            $users->save();

            return redirect('/admin/users')->with('success-edituser', 'successfully edited data');
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
        $users = users::find($id);
        $users->delete();

        // redirect
        return redirect('/admin/users')->with('success-deluser', 'successfully deleted data');
    }
}
