@extends('master.frontapp')
@section('content')
<title>Citilink | Cars</title>

<link href="{{ asset('assets/css/stylesyehbi.css') }}" rel="stylesheet">
<br>
<br>
<div class="container"><br><br>
  <?php if(!empty(Session::get('cityId'))){?>
    <input type="hidden" name="cityId" value="{{ Session::get('cityId') }}">
    <input type="hidden" name="city" value="{{ Session::get('city') }}">
    <input type="hidden" name="address" value="{{ Session::get('address') }}">
    <input type="hidden" name="pickUpTime" value="{{ Session::get('pickUpTime') }}">
    <input type="hidden" name="dropOffTime" value="{{ Session::get('dropOffTime') }}">

  <?php } ?>

          <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
              <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum"><img src="{{asset('assets/img/img2/sedan.png')}}" alt="" height="20px"></div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><font color="#32bb4c">Pilih Mobil</font></div>
                </div>

                <div class="col-xs-4 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                <div class="progress" style="margin: 17px 0;"><div class="progress-bar"></div></div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Layanan Tambahan</div>
              </div>

              <div class="col-xs-4 bs-wizard-step active"><!-- complete -->
              <div class="text-center bs-wizard-stepnum">&nbsp;</div>
              <div class="progress"><div class="progress-bar"></div></div>
              <a href="#" class="bs-wizard-dot"></a>
              <div class="bs-wizard-info text-center not-active">Pembayaran</div>
            </div>
          </div>
        </div>
        </div>
        <form action="" method="POST">
    <div class="col-lg-12" style="margin-top: 30px;">
    <div class="col-md-offset-3 col-md-6">
      <div class="input-group">
          <select name="sort" id="" class="form-control option-sort" style="border-left:1px solid #32bb4c;">
                  <option value="">A-Z</option>
                  <option value="">Z-A</option>
                  <option value="">Terendah-Tertinggi</option>
                  <option value="">Tertinggi-Terendah</option>
                </select>
          <span class="input-group-btn">
            <button class="btn green-sort" type="button">Sort</button>
          </span>
        </div><!-- /input-group -->
        </div>
      </div><!-- /.col-lg-6 -->
        </form>
        <div class="col-md-12 col-lg-12" style="padding: 0px 0px; margin-top:20px;" id="cars">

        </div>
</div>
</div>


<script type="text/javascript">
var cityId      = $('[name=cityId]').val();
var city        = $('[name=city]').val();
var pickUpTime  = $('[name=pickUpTime]').val();
var dropOffTime = $('[name=dropOffTime]').val();
var postData =
            {
                "_token":"{{ csrf_token() }}",
                "cityId": cityId,
                "city": city,
                "pickUpTime": pickUpTime,
                "dropOffTime": dropOffTime
            }
$.ajax({
  type: "POST",
  url: "{{ url('cars/api/available')}}",
  data: postData,
  success: function (data){
    $('#cars').html(data);
  }
});

</script>
@stop
