@extends('master.frontapp')
@section('content')
<title>Citilink</title>

<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

<div class="owl-carousel">
  @foreach($sliders as $slide)
    <div class="item" style="text-align:center;">
        <img src="<?php echo $slide->image; ?>" style="width:auto; max-width: 100%;max-height:567px;"/>
    </div>
  @endforeach
</div>

<div class="col-lg-offset-2 col-lg-8 booking-car" style="display:none;">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#find"><img src="{{asset('assets/img/mobil.png')}}" style="width:50px;height:50px;"/> Find Cars</a></li>
        <li><a data-toggle="tab" href="#manage"><img src="{{asset('assets/img/mobil.png')}}" style="width:50px;height:50px;"/> Manage my booking</a></li>
    </ul>
    <div class="tab-content">
        <div id="find" class="tab-pane fade in active">
          <form action="{{ url('cars')}}" method="post" id="subcars">
            {{ csrf_field() }}
            <div class="col-sm-12 bg-find">
                <div class="col-sm-12 col-md-5 spacing-book" style="text-align:left;">
                    <span>Area Penjemputan & Detail Alamat</span><br>
                    <div class="input-group" style="margin-bottom:10px;margin-top:7px;">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <select class="form-control" id="select-area" required>
                            <option selected>Pilih Area</option>
                        </select>
                        <input type="hidden" name="cityId">
                        <input type="hidden" name="city">
                        <script>
                          $('#select-area').change(function() {
                            var cityId  = $("#select-area option:selected").attr("data-id");
                            var city    = $('#select-area').val();
                            $('[name=cityId]').val(cityId);
                            $('[name=city]').val(city);
                          });
                        </script>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Contoh: No.Rumah / Gedung / dll" aria-describedby="basic-addon1" name="pickUpAddress">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4" style="text-align:left;">
                    <span>Waktu Penjemputan & Pengembalian</span><br>
                    <div class="input-group" style="margin-bottom:10px;margin-top:7px;">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input type="text" class="form-control datepick" placeholder="Tanggal Pergi" name="pickUpTime" id="iddate" required>
                        <span class="input-group-addon">
                          <select name="pickUpTime-hours" id="hourvalidate" onchange="hourchange()" style="border:0px;">
                              <option value="00" >00:00</option>
                              <option value="01" >01:00</option>
                              <option value="02" >02:00</option>
                              <option value="03" >03:00</option>
                              <option value="04" >04:00</option>
                              <option value="05" >05:00</option>
                              <option value="06" >06:00</option>
                              <option value="07" >07:00</option>
                              <option value="08" >08:00</option>
                              <option value="09" >09:00</option>
                              <option value="10" >10:00</option>
                              <option value="11" >11:00</option>
                              <option value="12" >12:00</option>
                              <option value="13" >13:00</option>
                              <option value="14" >14:00</option>
                              <option value="15" >15:00</option>
                              <option value="16" >16:00</option>
                              <option value="17" >17:00</option>
                              <option value="18" >18:00</option>
                              <option value="19" >19:00</option>
                              <option value="20" >20:00</option>
                              <option value="21" >21:00</option>
                              <option value="22" >22:00</option>
                              <option value="23" >23:00</option>
                              <option value="24" >24:00</option>
                          </select>
                        </span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input type="text" class="form-control datepick2" placeholder="Tanggal Pulang" name="dropOffTime" id="iddate2" required>
                        <span class="input-group-addon">
                          <select name="dropOffTime-hours" id="hourvalidate2" style="border:0px;">
                              <option value="00" >00:00</option>
                              <option value="01" >01:00</option>
                              <option value="02" >02:00</option>
                              <option value="03" >03:00</option>
                              <option value="04" >04:00</option>
                              <option value="05" >05:00</option>
                              <option value="06" >06:00</option>
                              <option value="07" >07:00</option>
                              <option value="08" >08:00</option>
                              <option value="09" >09:00</option>
                              <option value="10" >10:00</option>
                              <option value="11" >11:00</option>
                              <option value="12" >12:00</option>
                              <option value="13" >13:00</option>
                              <option value="14" >14:00</option>
                              <option value="15" >15:00</option>
                              <option value="16" >16:00</option>
                              <option value="17" >17:00</option>
                              <option value="18" >18:00</option>
                              <option value="19" >19:00</option>
                              <option value="20" >20:00</option>
                              <option value="21" >21:00</option>
                              <option value="22" >22:00</option>
                              <option value="23" >23:00</option>
                              <option value="24" >24:00</option>
                          </select>
                        </span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2" style="text-align:left;padding-right:0;">
                    <br>
                    <button type="button" class="btn-book btn-default" onclick="findcars()">
                        Search Cars <img src="{{asset('assets/img/mobilwhite.png')}}" style="width:34px;height:34px;"/>
                    </button>
                </div>
            </div>
          </form>
        </div>
        <div id="manage" class="tab-pane fade">
            <div class="col-sm-12 bg-find">
              <form action="{{ url('manage_booking')}}" method="post">
                {{ csrf_field() }}
                <div class="col-sm-5" style="text-align:left;">
                    <span>Masukan Kode Booking</span><br>
                    <div class="input-group" style="margin-bottom:10px;margin-top:7px;">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Kode Booking" aria-describedby="basic-addon1" name="booking-code">
                    </div>
                </div>
                <div class="col-sm-2" style="text-align:left;padding-right:0;">
                    <br>
                    <button type="submit" class="btn-send btn-default" style="color:#fff;">
                        Send
                    </button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-sm-12 home-title padding-0">
        <span class="green-col">Citilink</span> <span class="grey-col">Promotion</span>
    </div>
    <div class="col-xs-6 col-sm-4 promo-effect">
        <div class="promo-color">
            <div class="overlay">
                <div class="vertical-area">
                    <div class="middle">
                        <a href="#"><button class="btn btn-default">Learn more</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 padding-0">
                <img src="{{asset('assets/img/arrow.png')}}" class="img-responsive text-right hidden-xs" style="z-index:999px;position:absolute;"/>
                <div class="promo-height" style="background-image:url(assets/img/promo1.jpg);">
                </div>
            </div>
            <div class="col-sm-6 promo-detail">
                <span class="promo-big">Trip To</span><span> <img src="{{asset('assets/img/promotion.png')}}" style="width:40px;height:20px;"/></span><br>
                <span class="promo-big">Bali 3D2N</span><br>
                <span class="promo-small">Jakarta (CGK) ke Jogja (JOG)</span><br>
                <span class="promo-small">starts from</span><br>
                <sup>Rp </sup><span class="promo-big">544</span><sup>000</sup>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 promo-effect">
        <div class="promo-color">
            <div class="overlay">
                <div class="vertical-area">
                    <div class="middle">
                        <a href="#"><button class="btn btn-default">Learn more</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 padding-0">
                <img src="{{asset('assets/img/arrow.png')}}" class="img-responsive text-right hidden-xs" style="z-index:999px;position:absolute;"/>
                <div class="promo-height" style="background-image:url(assets/img/promo2.jpg);">
                </div>
            </div>
            <div class="col-sm-6 promo-detail">
                <span class="promo-big">Trip To</span><span> <img src="{{asset('assets/img/promotion.png')}}" style="width:40px;height:20px;"/></span><br>
                <span class="promo-big">Bali 3D2N</span><br>
                <span class="promo-small">Jakarta (CGK) ke Jogja (JOG)</span><br>
                <span class="promo-small">starts from</span><br>
                <sup>Rp </sup><span class="promo-big">544</span><sup>000</sup>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 promo-effect">
        <div class="promo-color">
            <div class="overlay">
                <div class="vertical-area">
                    <div class="middle">
                        <a href="#"><button class="btn btn-default">Learn more</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 padding-0">
                <img src="{{asset('assets/img/arrow.png')}}" class="img-responsive text-right hidden-xs" style="z-index:999px;position:absolute;"/>
                <div class="promo-height" style="background-image:url(assets/img/promo3.jpg);">
                </div>
            </div>
            <div class="col-sm-6 promo-detail">
                <span class="promo-big">Trip To</span><span> <img src="{{asset('assets/img/promotion.png')}}" style="width:40px;height:20px;"/></span><br>
                <span class="promo-big">Bali 3D2N</span><br>
                <span class="promo-small">Jakarta (CGK) ke Jogja (JOG)</span><br>
                <span class="promo-small">starts from</span><br>
                <sup>Rp </sup><span class="promo-big">544</span><sup>000</sup>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom:50px;">
    <div class="col-sm-12 home-title padding-0">
        <div class="col-sm-6 padding-0">
            <span class="green-col">Pilihan</span> <span class="grey-col">Mobil</span>
        </div>
        <div class="col-sm-6 text-right padding-0 recom-cars">
            <span class="green-col">We recommend</span><span class="grey-col"> Cars</span>
        </div>
    </div>
    <div class="col-sm-12 padding-0">
        <div class="owl-carousel1">
            <div class="item1">
                <div class="col-sm-12 padding-0 recom-detail">
                    <div class="col-sm-12 padding-0 bg-grey">
                        <img src="{{asset('assets/img/arrow2.png')}}" class="car-arrow hidden-xs"/>
                        <img src="{{asset('assets/img/car1.png')}}" class="car-scale"/>
                        <div class="col-sm-6 recom-name">
                            <span class="recom-name">Honda hr-v</span>
                        </div>
                        <div class="col-sm-6">
                            <sup>Rp</sup><span class="promo-big">433</span><sup>000</sup>
                        </div>
                    </div>
                    <div class="col-sm-12 car-desc padding-0">
                        <div class="col-sm-7 car-detail" style="padding-right:0px;">
                            <i class="fa fa-users i-grey i-space" aria-hidden="true"> 6</i>
                            <i class="fa fa-sliders i-grey i-space" aria-hidden="true"> M</i>
                            <i class="fa fa-user i-grey" aria-hidden="true"> Dorong</i><br>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-grey" aria-hidden="true"></i>
                            <span> (1 Reviews)</span>
                        </div>
                        <div class="col-sm-5">
                            <a href="{{url('/layanan')}}"><button type="button" name="button" class="btn btn-sm car-button">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item1">
                <div class="col-sm-12 padding-0 recom-detail">
                    <div class="col-sm-12 padding-0 bg-grey">
                        <img src="{{asset('assets/img/arrow2.png')}}" class="car-arrow hidden-xs"/>
                        <img src="{{asset('assets/img/car2.png')}}" class="car-scale"/>
                        <div class="col-sm-6 recom-name">
                            <span class="recom-name">Honda jazz</span>
                        </div>
                        <div class="col-sm-6">
                            <sup>Rp</sup><span class="promo-big">433</span><sup>000</sup>
                        </div>
                    </div>
                    <div class="col-sm-12 car-desc padding-0">
                        <div class="col-sm-7 car-detail" style="padding-right:0px;">
                            <i class="fa fa-users i-grey i-space" aria-hidden="true"> 6</i>
                            <i class="fa fa-sliders i-grey i-space" aria-hidden="true"> A</i>
                            <i class="fa fa-user i-grey" aria-hidden="true"> Air Kelapa</i><br>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-grey" aria-hidden="true"></i>
                            <span> (1 Reviews)</span>
                        </div>
                        <div class="col-sm-5">
                            <a href="{{url('/layanan')}}"><button type="button" name="button" class="btn btn-sm car-button">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item1">
                <div class="col-sm-12 padding-0 recom-detail">
                    <div class="col-sm-12 padding-0 bg-grey">
                        <img src="{{asset('assets/img/arrow2.png')}}" class="car-arrow hidden-xs"/>
                        <img src="{{asset('assets/img/car1.png')}}" class="car-scale"/>
                        <div class="col-sm-6 recom-name">
                            <span class="recom-name">Honda hr-v</span>
                        </div>
                        <div class="col-sm-6">
                            <sup>Rp</sup><span class="promo-big">433</span><sup>000</sup>
                        </div>
                    </div>
                    <div class="col-sm-12 car-desc padding-0">
                        <div class="col-sm-7 car-detail" style="padding-right:0px;">
                            <i class="fa fa-users i-grey i-space" aria-hidden="true"> 6</i>
                            <i class="fa fa-sliders i-grey i-space" aria-hidden="true"> M</i>
                            <i class="fa fa-user i-grey" aria-hidden="true"> Dorong</i><br>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-grey" aria-hidden="true"></i>
                            <span> (1 Reviews)</span>
                        </div>
                        <div class="col-sm-5">
                            <a href="{{url('/layanan')}}"><button type="button" name="button" class="btn btn-sm car-button">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item1">
                <div class="col-sm-12 padding-0 recom-detail">
                    <div class="col-sm-12 padding-0 bg-grey">
                        <img src="{{asset('assets/img/arrow2.png')}}" class="car-arrow hidden-xs"/>
                        <img src="{{asset('assets/img/car3.png')}}" class="car-scale"/>
                        <div class="col-sm-6 recom-name">
                            <span class="recom-name">Honda civic</span>
                        </div>
                        <div class="col-sm-6">
                            <sup>Rp</sup><span class="promo-big">433</span><sup>000</sup>
                        </div>
                    </div>
                    <div class="col-sm-12 car-desc padding-0">
                        <div class="col-sm-7 car-detail" style="padding-right:0px;">
                            <i class="fa fa-users i-grey i-space" aria-hidden="true"> 6</i>
                            <i class="fa fa-sliders i-grey i-space" aria-hidden="true"> M</i>
                            <i class="fa fa-user i-grey" aria-hidden="true"> Oli Bekas</i><br>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-grey" aria-hidden="true"></i>
                            <span> (1 Reviews)</span>
                        </div>
                        <div class="col-sm-5">
                            <a href="{{url('/layanan')}}"><button type="button" name="button" class="btn btn-sm car-button">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item1">
                <div class="col-sm-12 padding-0 recom-detail">
                    <div class="col-sm-12 padding-0 bg-grey">
                        <img src="{{asset('assets/img/arrow2.png')}}" class="car-arrow hidden-xs"/>
                        <img src="{{asset('assets/img/car1.png')}}" class="car-scale"/>
                        <div class="col-sm-6 recom-name">
                            <span class="recom-name">Honda hr-v</span>
                        </div>
                        <div class="col-sm-6">
                            <sup>Rp</sup><span class="promo-big">433</span><sup>000</sup>
                        </div>
                    </div>
                    <div class="col-sm-12 car-desc padding-0">
                        <div class="col-sm-7 car-detail" style="padding-right:0px;">
                            <i class="fa fa-users i-grey i-space" aria-hidden="true"> 6</i>
                            <i class="fa fa-sliders i-grey i-space" aria-hidden="true"> M</i>
                            <i class="fa fa-user i-grey" aria-hidden="true"> Aftur</i><br>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-yellow" aria-hidden="true"></i>
                            <i class="fa fa-star i-grey" aria-hidden="true"></i>
                            <span> (1 Reviews)</span>
                        </div>
                        <div class="col-sm-5">
                            <a href="{{url('/layanan')}}"><button type="button" name="button" class="btn btn-sm car-button">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 padding-0 text-center" style="margin-bottom:60px;">
    <a href="#" data-toggle="modal" data-target="#myModal"><img src="{{asset('assets/img/video.jpg')}}" style="width:auto;max-width:100%"/></a>
</div>

<div class="container">
    @foreach($blogs as $blog)
    <div class="col-xs-6 col-sm-6 col-md-3 blog-space">
        <img src="{{asset('assets/img/arrow2.png')}}" class="arrow2 hidden-xs"/>
        <div class="blog-height" style="background-image:url(<?php echo nl2br($blog->image) ?>);"></div>
        <div class="col-sm-12 blog-desc">
            <span class="blog-title">{{$blog->title}}</span><br>
            <span class="blog-green">{{$blog->description}}</span><br>
            <br>
            <span class="blog-tiny"><?php echo substr($blog->content,0,30)?></span><br>
            <br>
            <div class="col-sm-12 padding-0 text-right">
                <a href="{{url('blog/'.$blog->url)}}" class="btn-blog"><i class="fa fa-arrow-circle-right" style="font-size:24px;"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="container trigger-way">
    <div class="col-sm-12 home-title padding-0">
        <div class="col-sm-3 padding-0">
            <span class="order-title">3 STEP ORDER</span><br>
            <span><small>Langkah Mudah</small></span>
        </div>
    </div>
    <input type="hidden" id="checkScroll" value="1">
    <div class="col-sm-12 padding-0" style="margin-bottom:400px;">
        <img src="{{asset('assets/img/stepbg.png')}}" class="stepbg"/>
        <img src="{{asset('assets/img/step1.png')}}" class="textbg" id="text1"/>
        <img src="{{asset('assets/img/step2.png')}}" class="textbg" id="text2"/>
        <img src="{{asset('assets/img/step3.png')}}" class="textbg" id="text3"/>
        <div class="col-sm-offset-4 col-sm-7" style="margin-top:7%;" id="trigger-scroll">
            <img src="{{asset('assets/img/slider1.jpg')}}" class="step-post" id="img1"/>
            <img src="{{asset('assets/img/slider.png')}}" class="step-post" id="img2"/>
            <img src="{{asset('assets/img/video.png')}}" class="step-post" id="img3"/>
        </div>
    </div>
</div>

<!-- MODAL START -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content" style="border-radius:0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <iframe style="width:100%;height:400px;"src="https://www.youtube.com/embed/XGSy3_Czz8k">
                </iframe>
            </div>
        </div>

    </div>
</div>
<!-- MODAL END -->

<script type="text/javascript">
$('.owl-carousel').owlCarousel({
    autoplay:true,
    loop:true,
    pagination:false,
    nav : false,
    singleItem: true,
    items:1,
});

$('.owl-carousel1').owlCarousel({
    autoplay:false,
    loop:false,
    pagination:false,
    nav : false,
    items:4,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            loop:false
        },
        350:{
            items:2,
            loop:false
        },
        600:{
            items:3,
            loop:false
        },
        1000:{
            items:4,
            loop:false
        }
    }
});

var owl = $('.owl-carousel3');
owl.owlCarousel({
    autoplay:false,
    loop:true,
    pagination:false,
    nav : false,
    items:1,
    animateOut: 'fadeOut',
    autoplayTimeout: 2000,
});

$('.stepbg').on('mousewheel', '.owl-stage', function (e) {
    owl.trigger('next.owl');
    e.preventDefault();
});

var pd = $('.promo-detail').height();
$('.promo-height').height(pd);
</script>

<script type="text/javascript">
$('#img1').addClass('step-in');
$('#text1').addClass('step-in');

var trigger = $('.trigger-way');
var h = $('.trigger-way').offset();
h.top = parseInt(h.top) - 100;
$(window).resize(function(){
    var h = $('.trigger-way').offset();
    h.top = parseInt(h.top) - 100;
});

// var h = $('.height-step').height();

var lastScrollTop = 0, delta = 5;

$(window).scroll(function (event) {
    var st = $(this).scrollTop();

    if(Math.abs(lastScrollTop - st) <= delta)
    return;
    if(st > h.top){
        if (st > lastScrollTop){
            // downscroll code
            if($('#checkScroll').val() != 4){
                $(document).scrollTop(h.top);
                $("body").css("overflow-y", "hidden");
                $(".col-sm-7").attr("title", "Scrool");
            }
            console.log('scroll down');
        } else {
            // upscroll code
            if($('#checkScroll').val() != 1){
                $(document).scrollTop(h.top);
                $("body").css("overflow-y", "hidden");
                $(".col-sm-7").attr("title", "Scrool");
            }
            console.log('scroll up');
        }
        lastScrollTop = st;
    }
});

$(window).bind('mousewheel', function(e){
    if($(".col-sm-7").attr("title") == "Scrool"){
        if(e.originalEvent.wheelDelta /120 > 0) {
            if ($("#checkScroll").val() == "4") {
                e.preventDefault();
                $('#img3').addClass('step-in');
                $('#text3').addClass('step-in');
                $("#checkScroll").val("3");
            } else if ($("#checkScroll").val() == "3") {
                e.preventDefault();
                $('#img3').removeClass('step-in');
                $('#text3').removeClass('step-in');
                $('#img2').addClass('step-in');
                $('#text2').addClass('step-in');
                $("#checkScroll").val("2");
            } else if ($("#checkScroll").val() == "2") {
                e.preventDefault();
                $('#img2').removeClass('step-in');
                $('#text2').removeClass('step-in');
                $('#img1').addClass('step-in');
                $('#text1').addClass('step-in');
                $("#checkScroll").val("1");
            } else if ($("#checkScroll").val() == "1") {
                $("body").attr("style", "overflow-y: visible");
                $(".col-sm-7").attr("title", "");
            }
        } else {
            if ($("#checkScroll").val() == "1") {
                e.preventDefault();
                $('#img1').addClass('step-in');
                $('#text1').addClass('step-in');
                $("#checkScroll").val("2");
            } else if($("#checkScroll").val() == "2"){
                e.preventDefault();
                $('#img1').removeClass('step-in');
                $('#text1').removeClass('step-in');
                $('#img2').addClass('step-in');
                $('#text2').addClass('step-in');
                $("#checkScroll").val("3");
            } else if ($("#checkScroll").val() == "3") {
                e.preventDefault();
                $('#img2').removeClass('step-in');
                $('#text2').removeClass('step-in');
                $('#img3').addClass('step-in');
                $('#text3').addClass('step-in');
                $("#checkScroll").val("4");
            } else if ($("#checkScroll").val() == "4") {
                $("body").attr("style", "overflow-y: visible");
                $(".col-sm-7").attr("title", "");
            }
        }
    }
});
</script>
<script type="text/javascript">
    var cars = $('.booking-car');
    cars.waypoint(function(){
        cars.addClass('animated fadeInUp');
        cars.css('display','block');
    }, {offset:'100%'});
</script>

<script type="text/javascript">
var postData =
            {
                "_token":"{{ csrf_token() }}"
            }
$.ajax({
  type: "POST",
  url: "{{ url('getcity')}}",
  data: postData,
  success: function (data){
    $('#select-area').html(data);
  }
});

</script>

<script type="text/javascript">
var today = new Date();
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var complete = month + '/' + date + '/' +  today.getFullYear();
var hour = today.getHours();
var validhour = parseInt(hour+01);

$( ".datepick" ).datepicker({
    startDate: today,
});
$(".datepick").on("change",function(){
    var selected = $(this).val();
    $('#iddate').val(selected);
    $('#hourvalidate').val('00');
});

$( ".datepick2" ).datepicker({
    startDate: today,
});
$(".datepick2").on("change",function(){
    var selected2 = $(this).val();
    $('#iddate2').val(selected2);
    $('#hourvalidate2').val('00');
});

function hourchange(){
    var datepick = $('#iddate').val();
    var pick = $('#hourvalidate').val();
    if (datepick == complete) {
        if (validhour >= pick) {
            alert('Waktu penjemputan harus 2 jam melebihi waktu sekarang.');
            $('#hourvalidate').val('00');
        }
    }
}

function findcars(){
    var datepick = $('#iddate').val();
    var datepick2 = $('#iddate2').val();
    var hourpick = $('#hourvalidate').val();
    var hourpick2 = $('#hourvalidate2').val();

    // var token = $('#token').val();
    var dataString = '_token=' + "{{ csrf_token() }}"
                    + '&datepick=' + datepick
                    + '&datepick2=' + datepick2
                    + '&hourpick=' + hourpick
                    + '&hourpick2=' + hourpick2;

    $.ajax({
        type: "POST",
        url: "{{ url('find_cars') }}",
        data: dataString,
        success: function (data) {
            if(data == 1){
                $('#subcars').submit();
            }else {
                alert('Waktu pengembalian harus melebihi waktu penjemputan.');
            }
        },
    });
}


</script>

@stop
