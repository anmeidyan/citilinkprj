@extends('master.frontapp')
@section('content')
<title>Citilink | Payment</title>

<link href="{{ asset('assets/css/stylesyehbi.css') }}" rel="stylesheet">
<br>
<br>
<div class="container"><br><br>
  <input type="hidden" name="carTypeId" value="{{ Session::get('cityId') }}">
  <input type="hidden" name="carType" value="{{ Session::get('city') }}">

  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 ">
      <div class="row bs-wizard" style="border-bottom:0;">
        <div class="col-xs-4 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">&nbsp;</div>
          <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center not-active">Pilih Mobil</div>
        </div>

        <div class="col-xs-4 bs-wizard-step complete"><!-- complete -->
          <div class="text-center bs-wizard-stepnum">&nbsp;</div>
          <div class="progress" style="margin: 17px 0;"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center"><font color="#32bb4c">Layanan Tambahan</font></div>
        </div>

        <div class="col-xs-4 bs-wizard-step active"><!-- complete -->
          <div class="text-center bs-wizard-stepnum"><img src="{{asset('assets/img/img2/sedan.png')}}" alt="" height="20px"></div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center not-active">Pembayaran</div>
    </div>
  </div>



</div>
</div>

<legend>Pembayaran dan Data Pemesan</legend>
<div class="row">
  <div class="col-sm-6">
    <div class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-3 control-label">Car Type</label>
        <div class="col-sm-9">
          <p class="form-control-static">{{ Session::get('carType') }}</p>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <div class="form-group">
        <label class="col-sm-3 control-label">Addon</label>
        <div class="col-sm-9">
          <p class="form-control-static">Snack</p>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <hr>
      <div class="form-group">
        <label class="col-sm-3 control-label">Package</label>
        <div class="col-sm-9">
          <p class="form-control-static">2 Hours</p>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <div class="form-group">
        <label class="col-sm-3 control-label">Pick Up Time</label>
        <div class="col-sm-9">
          <p class="form-control-static">{{ Session::get('pickUpTime') }}</p>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <div class="form-group">
        <label class="col-sm-3 control-label">Drop Off Time</label>
        <div class="col-sm-9">
          <p class="form-control-static">{{ Session::get('dropOffTime') }}</p>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <div class="form-group">
        <label class="col-sm-3 control-label">Promo Code</label>
        <div class="col-sm-9">
          <div class="input-group">
           <input type="text" class="form-control" placeholder="">
           <span class="input-group-btn">
             <button class="btn btn-secondary" type="button">Use!</button>
           </span>
         </div>
        </div><!--/.col-->
      </div><!--/.form-group-->
      <div class="form-group">
        <label class="col-sm-3 control-label">Grand Total</label>
        <div class="col-sm-9">
          <p class="form-control-static">IDR 272,000</p>
        </div><!--/.col-->
      </div><!--/.form-group-->

    </div><!--/.form-horizontal-->

  </div><!--/.row-->
  <div class="col-sm-6">
    <form action="{{ url('cars/payment')}}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" placeholder="" name="customerName">
      </div>
      <div class="form-group">
        <label>Customer Email</label>
        <input type="text" class="form-control" placeholder="" name="customerEmail">
      </div>
      <div class="form-group">
        <label>Customer Phone</label>
        <input type="text" class="form-control" placeholder="" name="customerPhone">
      </div>

      <div class="checkbox">
        <label>
          <input type="checkbox"> Saya menyetujui syarat & ketentuan yang berlaku dan bersedia menerima promo dari CitilinkCars
        </label>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div><!--/.row-->
</div><!--/.row-->





<script>
  // var carTypeId = $('[name=carTypeId]').val();
  // var carType = $('[name=carType]').val();
  // var postData =
  //             {
  //                 "_token":"{{ csrf_token() }}",
  //                 "carTypeId": carTypeId,
  //                 "carType": carType,
  //             }
  // $.ajax({
  //   type: "POST",
  //   url: "{{ url('cars/api/addon')}}",
  //   data: postData,
  //   success: function (data){
  //     $('#addon').html(data);
  //   }
  // });

</script>
      @stop
