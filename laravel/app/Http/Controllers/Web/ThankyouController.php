<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;
use Session;

class ThankyouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bookingCode) //Get & Post
    {

        return view('web.thankyou',[
          'bookingCode' => $bookingCode
        ]);
    }
}
