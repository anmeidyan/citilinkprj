<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;
use Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Get & Post
    {
        //Home
        // $sliders  = sliders::where('enable','=',1)->get();

        return view('web.manage_booking',[
          // 'sliders' => $sliders
        ]);
    }

    public function manage_booking()
    {
      # code...
      $bookingcode      = Input::get('bookingcode');

      $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/order/getOneByCode/";
      $username ="API.hourlyRental.2016";
      $password ="4P1.hourlyRental.2016";
      $post = array(
        "bookingCode"      => $bookingcode,
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
      // echo "<pre>";
      // var_dump($data);
      // echo "</pre>";
      $pick   = date("d F Y H:i",$data->pickUpTime / 1000);
      $drop   = date("d F Y H:i",$data->dropOffTime / 1000);
      if(!isset($data->city)){
        echo "<div class='alert alert-warning'>Booking code not found</div>";
      }else{
        echo "<div class='row'>
          <div class='form-horizontal text-left'>
          <div class='col-md-6'>
              <legend>Booking Info</legend>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>City</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$data->city."</p>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>Pick Up Time</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$pick."</p>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>Drop Off Time</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$drop."</p>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>Customer Name</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$data->customerName."</p>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>Customer Phone</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$data->customerPhone."</p>
                </div>
              </div>

              <div class='form-group'>
                <label class='col-sm-3 control-label'>Pick Up Address</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'> ".$data->pickUpAddress."</p>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-3 control-label'>Addons</label>
                <div class='col-sm-9'>
                  <p class='form-control-static'>
                    ";
                    foreach ($data->addons as $add) {
                      # code...
                      echo $add->addon."(".$add->addonQty.")<br>";
                    }
                    echo "</p>
                </div>
              </div>


            </div>
            <div class='col-md-6'>
                <legend>Car Info</legend>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Car Type</label>
                  <div class='col-sm-9'>
                    <p class='form-control-static'> ".$data->carType."</p>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Car Category</label>
                  <div class='col-sm-9'>
                    <p class='form-control-static'> ".$data->carCategory."</p>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Car Merk</label>
                  <div class='col-sm-9'>
                    <p class='form-control-static'> ".$data->carMerk."</p>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Car Year</label>
                  <div class='col-sm-9'>
                    <p class='form-control-static'> ".$data->carYear."</p>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Car Seat</label>
                  <div class='col-sm-9'>
                    <p class='form-control-static'> ".$data->carSeat."</p>
                  </div>
                </div>

              </div><!--/.col-->
          </div><!--/.form-horizontal-->
        </div><!--/.row-->
        <div class='row'>
          <div class='col-sm-12'>
            <button type='button' class='btn btn-danger' onClick=\"cancel_order('$bookingcode');\">Cancel Order</button>
          </div>
        </div>
        ";
      }


    }
    public function docancel()
    {
        # code...
        $bookingcode      = Input::get('bookingcode');

        $url= "http://202.137.21.100:8080/aims2/retail/hourlyRental/order/cancel/";
        $username ="API.hourlyRental.2016";
        $password ="4P1.hourlyRental.2016";
        $post = array(
          "bookingCode"      => $bookingcode,
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
        if($data->status == "100"){
          echo 'success';
        }else if($data->status == "101"){
          echo "error";
        }else{
          echo "error";
        }
    }

}
