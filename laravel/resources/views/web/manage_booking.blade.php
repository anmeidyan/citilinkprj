@extends('master.frontapp')
@section('content')
<title>Citilink | Manage Booking</title>

<link href="{{ asset('assets/css/manage_booking.css') }}" rel="stylesheet">

<!-- Page Content -->
<div class="container">
  <div class="row input">
    <div class="col-md-6 col-md-offset-3 text-center">
      <form class="form-inline">
        <div class="form-group">
          <label class="sr-only">Kode Booking</label>
          <p class="form-control-static">Kode Booking</p>
        </div>
        <div class="form-group">
          <label class="sr-only">Kode Booking</label>
          <input type="text" class="form-control" placeholder="Masukan Kode Booking" name="booking-code" value="<?php if(!empty($_POST['booking-code'])){ echo $_POST['booking-code'];}?>">
        </div>
        <button type="button" class="btn btn-success" id="btn_booking">Search</button>
      </form>
    </div>
  </div>

  <div id="booking-result"></div>
  <center>
    <img src="{{ asset('assets/img/loading.gif')}}" id="booking-loading" style="display:none;">
  </center>


</div>
<!-- /.container -->

<script type="text/javascript">

  $(document).ready(function() {
    manage_booking();
  });

  $('#btn_booking').click(function() {
    var bookingcode = $('[name=booking-code]').val();
    if(bookingcode == ""){
        $('#booking-result').html("<div class='alert alert-danger'>Booking code not allowed empty</div>");
    }else{
        manage_booking();
    }
  });

  function manage_booking() {
    $('.alert').fadeOut();
    var bookingcode = $('[name=booking-code]').val();
    if(bookingcode !== ""){
      var postData =
                  {
                      "_token":"{{ csrf_token() }}",
                      "bookingcode": bookingcode,
                  }
      $.ajax({
        type: "POST",
        url: "{{ url('manage_booking/api')}}",
        data: postData,
        beforeSend: function() {
          $('.alert').fadeOut();
          $('#booking-loading').fadeIn();
          $('#booking-result').html("");
        },
        success: function (data){
          $('#booking-loading').hide();
          $('#booking-result').html(data);
        }
      });
    }
  }
</script>

@stop
