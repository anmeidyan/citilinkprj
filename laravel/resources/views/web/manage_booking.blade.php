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

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="Display:none;" id="btn_confirmcancel">Open Modal</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm ?</h4>
        </div>

        <form class="form-horizontal">
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->

            <input type="text" name="cancelbookingCode">

            <div class="form-group">
              <label  class="col-md-4 control-label">Customer Email</label>
              <div class="col-sm-6">
                <input type="email" class="form-control" placeholder="" name="customerEmail">
              </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onClick="docancel();">Cancel Order</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btncanc">Close</button>
        </div>
        </form>
      </div>

    </div>
  </div>

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

  function cancel_order(bookingcode) {
    // alert(bookingcode);
    $('#btn_confirmcancel').click();
    $('[name=cancelbookingCode]').val(bookingcode);
  }
  function docancel() {
    var bookingcode = $('[name=cancelbookingCode]').val();

    var postData =
                {
                    "_token":"{{ csrf_token() }}",
                    "bookingcode": bookingcode,
                }
    $.ajax({
      type: "POST",
      url: "{{ url('manage_booking/api/docancel')}}",
      data: postData,
      beforeSend: function() {
        // $('.alert').fadeOut();
        // $('#booking-loading').fadeIn();
        // $('#booking-result').html("");
      },
      success: function (data){
        if(data == "success"){
          manage_booking();
          $('#btncanc').click();
        }else{

        }
        // $('#booking-loading').hide();
        // $('#booking-result').html(data);
      }
    });
  }
</script>

@stop
