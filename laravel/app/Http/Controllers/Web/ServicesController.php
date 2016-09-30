<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Home
        // $sliders  = sliders::where('enable','=',1)->get();
        return view('web.services',[
          // 'sliders' => $sliders
        ]);
    }
}
