<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;
use Session;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //get
    {
        //Home
        // $sliders  = sliders::where('enable','=',1)->get();
        return view('web.cars.index',[
          // 'sliders' => $sliders
        ]);
    }

    public function searchcar() //Post
    {
      # code...
      $cityId       = Input::get('cityId');
      $city         = Input::get('city');
      $pickUpAddress= Input::get('pickUpAddress');
      $pickUpTime   = date('d F Y',strtotime(Input::get('pickUpTime')))." ".Input::get('pickUpTime-hours').":00";
      $dropOffTime  = date('d F Y',strtotime(Input::get('dropOffTime')))." ".Input::get('dropOffTime-hours').":00";


      Session::set('cityId',$cityId);
      Session::set('city',$city);
      Session::set('pickUpAddress',$pickUpAddress);
      Session::set('pickUpTime',$pickUpTime);
      Session::set('dropOffTime',$dropOffTime);

      Session::forget('carTypeId');
      Session::forget('carType');
      Session::forget('carRatesPerHour');

      return view('web.cars.index');
    }
    public function apicars() //Post API
    {
      $cityId       = Input::get('cityId');
      $city         = Input::get('city');
      $pickUpTime   = strtotime(Session::get('pickUpTime'))*1000;
      $dropOffTime  = strtotime(Session::get('dropOffTime'))*1000;

      $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/car/getAvailabilityAndRatesByCity/";
      $username ="API.hourlyRental.2016";
      $password ="4P1.hourlyRental.2016";
      $post = array(
        "cityId"      => $cityId,
        "city"        => $city,
        "pickUpTime"  => $pickUpTime,
        "dropOffTime" => $dropOffTime,
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
        echo "<div class='alert alert-warning'>No Cars Available</div>";
      }else{
        foreach ($data as $d) {
          # code...
          echo  "<div class='col-md-4 col-sm-6 hover' style='margin-top:20px;'>
          <img src='".asset('assets/img/img2/mobil.png')."' class='img-responsive' />
          <p class='judul-pilih1'>".$d->carType."</p>
          <ul class='colourswatches'>
          <div class='col-xs-3' style='margin-top: -15px;'><p style='color: white;'><i class='fa fa-users'>  ".$d->carSeat."</i></p></div>
          <div class='col-xs-5' style='margin-top: -15px;'><p style='color: white;'><img src='".asset('assets/img/img2/gigi.png')."' alt='' height='15px' width='20px'> Automatic</p></div>
          <div class='col-xs-4' style='margin-top: -15px; padding-right:1px; padding-left: 2px;'><p style='color: white;'><img src='".asset('assets/img/img2/premium.png')."' alt='' height='17px' width='20px'> Pertamax</p></div>
          </ul>
          <p class='judul-pilih'>Harga Mobil</p>
          <p class='judul-pilih'>Lama Sewa : 150 jam</p>
          <div class='col-xs-8 harga-pilih'>IDR ".$d->carRatesPerHour."</div>
          <form action=".url('cars/prepare_addon')." method='post'>
          ".csrf_field()."
          <input type='hidden' name='carTypeId' value='".$d->carTypeId."'>
          <input type='hidden' name='carType' value='".$d->carType."'>
          <input type='hidden' name='carSeat' value='".$d->carSeat."'>
          <input type='hidden' name='carRatesPerHour' value='".$d->carRatesPerHour."'>
          <div class='col-xs-4'><button type='submit' class='btn green-sea-pesan'>Pesan</button></div>
          </form>
          </div>";
        }
      }
    }
    public function prepare_addon()
    {
      # code...
      $carTypeId  = Input::get('carTypeId');
      $carType  = Input::get('carType');
      $carRatesPerHour  = Input::get('carRatesPerHour');
      Session::set('carTypeId',$carTypeId);
      Session::set('carType',$carType);
      Session::set('carRatesPerHour',$carRatesPerHour);

      return Redirect('cars/add-on');
    }
}
