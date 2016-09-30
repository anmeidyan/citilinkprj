<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Home
        $sliders  = sliders::where('enable','=',1)->get();
        return view('web.home',[
          'sliders' => $sliders
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

      foreach ($data as $d) {
        echo "<option value='".$d->cityId."'>".$d->city."</option>";
      }
    }
}
