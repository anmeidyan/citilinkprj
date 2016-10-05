<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Session;
use App\blogs;
use DateTime;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Session::forget('cityId');
        Session::forget('city');
        Session::forget('address');
        Session::forget('pickUpTime');
        Session::forget('dropOffTime');

        Session::forget('carTypeId');
        Session::forget('carType');
        Session::forget('carRatesPerHour');
        //Home
        $sliders  = sliders::where('enable','=',1)->get();
        $blogs = blogs::where('enable','=',1)->get();
        return view('web.home',[
          'sliders' => $sliders,
          'blogs' => $blogs
        ]);
    }

    public function getcity()
    {
      $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/city/getAll/";
      $username ="API.hourlyRental.2016";
      $password ="4P1.hourlyRental.2016";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      curl_close($ch);
      $data = json_decode($output);

      if($data == null){
          echo "<option value='' data-id='' selected disabled>Pilih Area</option>";
      }else{
          echo "<option value='' data-id='' selected disabled>Pilih Area</option>";
        foreach ($data as $d) {
          echo "<option value='".$d->city."' data-id='".$d->cityId."'>".$d->city."</option>";
        }
      }
    }
}
