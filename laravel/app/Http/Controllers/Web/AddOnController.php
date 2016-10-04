<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;

class AddOnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      # code...
      return view('web.cars.add-on');
    }
    public function apiaddon()
    {
      # code...
      $carTypeId  = Input::get('carTypeId');
      $carType    = Input::get('carType');

      $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/car/getAddonByCarType/";
      $username ="API.hourlyRental.2016";
      $password ="4P1.hourlyRental.2016";
      $post = array(
        "carTypeId" => $carTypeId,
        "carType"   => $carType
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
      if(count($data) == 0){
        echo "<div class='col-sm-12'><p class='help-block'>No Addon Available</p></div>";
      }else{

        foreach ($data as $d) {
          echo "<div class='col-sm-4'>
            <div class='row'>
              <div class='col-xs-5 col-sm-4 img-icon'>
              ";
              if($d->addonId == 1 ){
                  echo "<img src='".asset('assets/img/addon/bottle.png')."' alt='' align='center'>";
              }else if($d->addonId == 2){
                  echo "<img src='".asset('assets/img/addon/popcorn.png')."' alt='' align='center'>";
              }else if($d->addonId ==3){
                  echo "<img src='".asset('assets/img/addon/magazine.png')."' alt='' align='center'>";
              }
              echo "</div>
              <div class='col-xs-7 col-sm-8'>
                <p class='tambahan'>".$d->addon."</p>
                <p class='tambahan1'>(&commat;IDR ".$d->addonValue.")</p>
                <select name='' id='' class='option form-control'>
                  <option value='1'>1</option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>
                  <option value='4'>4</option>
                  <option value='5'>5</option>
                  <option value='6'>6</option>
                  <option value='7'>7</option>
                  <option value='8'>8</option>
                  <option value='9'>9</option>
                  <option value='10'>10</option>
                </select>
              </div>
              </div><!-- img -->
            </div>";
        }
      }
    }
    public function prepare_payment()
    {
      # code...

    }
}
