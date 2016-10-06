<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\orders;
use App\orders_addons;
use DateTime;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = orders::where('ordersStatus','=',0)->orwhere('ordersStatus','=',1)->get();
        return view('admin.orders.index',[
          'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $now = new DateTime();
        $orders = orders::find($id);
        $orders->ordersStatus  = 3;
        $orders->updated_at    = $now;
        $orders->save();

        // redirect
        return redirect('/admin/orders')->with('delete', 'successfully cancel data');
    }

    public function destroy($id)
    {
        $orders = orders::find($id);
        $orders->delete();

        // redirect
        return redirect('/admin/orders/history')->with('delete', 'successfully delete data');
    }

    public function history()
    {
        $orders = orders::where('ordersStatus','=',2)->orwhere('ordersStatus','=',3)->get();
        return view('admin.orders.history',[
          'orders' => $orders
        ]);
    }
}
