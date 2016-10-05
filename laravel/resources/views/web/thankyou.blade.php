@extends('master.frontapp')
@section('content')
<title>Citilink | Thankyou</title>

<link href="{{ asset('assets/css/thankyou.css') }}" rel="stylesheet">
<div class="bg">
<div class="container"><br><br>
    <div class="row">
        <div align="center" class="col-lg-8 col-lg-offset-2">
        <h1 class="thankyou-header">" Thankyou For Your Order "</h1>
        </div>
    </div>
    <div class="row">
        <p class="thankyou-content" style="text-align: justify; text-align-last: center;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu varius ligula, quis pharetra leo. Vestibulum volutpat feugiat pulvinar. Sed vulputate purus pharetra aliquet sollicitudin. Duis rutrum odio vel leo placerat, ut fermentum leo porttitor. Sed et facilisis nibh. Cras vestibulum, nisl a finibus venenatis, turpis odio semper quam, maximus volutpat justo tortor nec magna. Vivamus sit amet hendrerit felis. Duis leo velit, tincidunt nec lacus sit amet, laoreet volutpat augue. Nulla a massa leo. Aenean faucibus ligula vel elementum eleifend. Proin viverra justo sit amet ligula egestas sagittis. Quisque fermentum, ex quis placerat faucibus, erat quam pharetra diam, ut tincidunt augue nibh sed risus. Curabitur id interdum lacus. Sed ac consequat felis.
        </p>
    </div>
    <div class="bookingcode text-center">
        <H3>BOOKING CODE</H3>
        <H3>"<?php echo $bookingCode;?>"</H3>

    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <a href="{{ url('/') }}" class="btn green-sea-finish pull-right col-*">
                <span class="fa fa-home"></span> Home
            </a>
        </div>
        <div class="col-md-6 col-sm-12">
          <form action="{{ url('manage_booking')}}" method="post">
            <input type="hidden" name="booking-code" value="<?php echo $bookingCode;?>">
            {{ csrf_field() }}
            <button class="btn green-sea-finish col-*">
                <span class="fa fa-laptop"></span> Manage My Booking
            </button>
          </form>
        </div>
    </div>
</div>
</div>
@stop
