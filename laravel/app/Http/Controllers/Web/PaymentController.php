<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;
use Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      # code...
      return view('web.cars.payment');
    }
    public function dopayment()
    {
      # code...
      $cityId        = Session::get('cityId');
      $city          = Session::get('city');
      // $pickUpTime    = Session::get('pickUpTime');
      // $dropOffTime   = Session::get('dropOffTime');
      // $pickUpTime    = "1474786800000";
      // $dropOffTime   = "1474797600000";

      $pickUpTime    = strtotime(Session::get('pickUpTime'))*1000;
      $dropOffTime   = strtotime(Session::get('dropOffTime'))*1000;
      $carTypeId     = Session::get('carTypeId');
      $carType       = Session::get('carType');
      $customerName  = Input::get('customerName');
      $customerPhone = Input::get('customerPhone');
      $customerEmail = Input::get('customerEmail');
      $pickUpAddress = Session::get('pickUpAddress');
      //
      echo $cityId."<br>";
      echo $city ."<br>";
      echo $pickUpTime  ."<br>";
      echo $dropOffTime ."<br>";
      echo $carTypeId  ."<br>";
      echo $carType     ."<br>";
      echo $customerName ."<br>";
      echo $customerPhone ."<br>";
      echo $customerEmail."<br>";
      echo $pickUpAddress."<br>";


      $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/order/booking/";
      $username ="API.hourlyRental.2016";
      $password ="4P1.hourlyRental.2016";
      $post = array(
        "cityId"        => $cityId,
        "city"          => $city,
        "pickUpTime"    => $pickUpTime,
        "dropOffTime"   => $dropOffTime,
        "carTypeId"     => $carTypeId,
        "carType"       => $carType,
        "addons"        => array([
          'addonId'   => "1",
          'addonQty'  => "1",
        ]),
        "customerName"  => $customerName,
        "customerPhone" => $customerPhone,
        "customerEmail" => $customerEmail,
        "pickUpAddress" => $pickUpAddress,
      );
      $data_json = json_encode($post);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url );
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
      curl_setopt($ch, CURLOPT_POST, true );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      curl_close($ch);
      $data = json_decode($output);
      var_dump($data);
    }
}
