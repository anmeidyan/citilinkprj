<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\sliders;
use Input;
use Session;
use App\orders;
use App\orders_addons;
use DateTime;

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
        $now           = new DateTime();
        $cityId        = Session::get('cityId');
        $city          = Session::get('city');
        $pickUpTime    = strtotime(Session::get('pickUpTime'))*1000;
        $dropOffTime   = strtotime(Session::get('dropOffTime'))*1000;
        $carTypeId     = Session::get('carTypeId');
        $carType       = Session::get('carType');
        $customerName  = Input::get('customerName');
        $customerPhone = Input::get('customerPhone');
        $customerEmail = Input::get('customerEmail');
        $pickUpAddress = Session::get('pickUpAddress');
        $carRatesPerHour=Session::get('carRatesPerHour');

        $image         = Session::get('image');
        $hours         = Session::get('hours');


        $voucherCode   = Session::get('voucherCode');
        $voucherValue  = Session::get('voucherValue');

        $grandTotal    = $carRatesPerHour * $hours - $voucherValue  ;

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
        if(!empty($data->bookingCode)){



        $orders = new orders;
        $orders->ordersStatus = 0;
        $orders->cityId       = $cityId;
        $orders->city         = $city;
        $orders->pickUpTime   = $pickUpTime;
        $orders->dropOffTime  = $dropOffTime;
        $orders->carTypeId    = $carTypeId;
        $orders->carType      = $carType;
        $orders->carImage     = $image;
        $orders->customerName = $customerName;
        $orders->customerPhone= $customerPhone;
        $orders->customerEmail= $customerEmail;
        $orders->pickUpAddress= $pickUpAddress;
        $orders->grandTotal   = $grandTotal;
        $orders->package      = $hours;
        $orders->voucherCode  = $voucherCode;
        $orders->voucherValue = $voucherValue;
        $orders->bookingCode  = $data->bookingCode;
        $orders->bookingStatus= $data->status;
        $orders->bookingMessage= $data->message;
        $orders->created_at   = $now;
        $orders->save();

        // foreach ($data->addons as $add) {
        //   # code...
        //   echo $add->addon."(".$add->addonQty.")<br>";
        // }

      //  foreach ($variable as $key => $value) {
          # code...
        $orders_addons               = new orders_addons;
        $orders_addons->bookingCode  = $data->bookingCode;
        $orders_addons->addonId      = 1;
        $orders_addons->addonQty     = 1;
        $orders_addons->save();

      //  }


        Session::forget('cityId');
        Session::forget('city');
        Session::forget('address');
        Session::forget('pickUpTime');
        Session::forget('dropOffTime');
        Session::forget('hours');
        Session::forget('carTypeId');
        Session::forget('carType');
        Session::forget('carRatesPerHour');
        Session::forget('image');
        Session::forget('voucherCode');
        Session::forget('voucherValue');

        return redirect('thankyou/'.$data->bookingCode);
      }

    }
}
