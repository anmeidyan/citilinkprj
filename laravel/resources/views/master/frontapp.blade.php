<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\font-awesome-4.6.1\css\font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/owl.carousel.2/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/datepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/owl.carousel.2/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

</head>
<body id="myDiv">
    <div class="loader"></div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-sm-12 padding-0 header-head">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('assets/img/logo.png')}}" class="header-logo"/></a>
                    <a class="nav-toggle-btn hidden-sm hidden-md hidden-lg pull-right" style="padding-left: 20px;color:black;">
                        <i class="fa fa-bars fa-2x" style=" margin-top: 10px;padding-right:30px;"></i>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <br>
                            <a href="#">Info Penerbangan</a>
                        </li>
                        <li class="login-ul">
                            @if (Auth::guest())
                            <a href="#" data-toggle="modal" data-target="#loginModal" onclick="getlogin()"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                            @else
                            <a href="{{url('/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif
                            @if (Auth::check())
                            <a href="#" class="supergreen-nav"><span style="color:#65b32e;">{{Auth::user()->name}}</span></a>
                            @endif
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
        <div class="container padding-0 hidden-xs">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#"><img src="{{asset('assets/img/pesawat.png')}}"/> <span>Flight</span></a></li>
                <li><a href="#"><img src="{{asset('assets/img/hotel.png')}}"/> <span>Hotel</span></a></li>
                <li><a href="{{url('cars')}}"><img src="{{asset('assets/img/mobil.png')}}"/> <span>Cars</span></a></li>
                <li><a href="#"><img src="{{asset('assets/img/store.png')}}"/> <span>Store</span></a></li>
            </ul>
        </div>
    </nav>

    <div class="content-wrap">
        @yield('content')
    </div>

    <div class="col-sm-12 footer-border">
        <div class="container footer-space">
            <div class="col-sm-2">
                <span class="footer-title">TENTANG KAMI</span>
                <ul class="footer-list">
                    <li><a href="#">Informasi Perusahaan</a></li>
                    <li><a href="#">Armada</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Peta Situs</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <span class="footer-title">PRODUK</span>
                <ul class="footer-list">
                    <li><a href="#">Citilink Merchant</a></li>
                    <li><a href="#">Citilink Cafe</a></li>
                    <li><a href="#">Citilink Shield</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <span class="footer-title">LOGIN</span>
                <ul class="footer-list">
                    <li><a href="#">Travel Agent</a></li>
                    <li><a href="#">Perusahaan</a></li>
                </ul>
            </div>
            <div class="col-sm-6 text-center">
                <div class="social-wrap">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container footer-space">
            <div class="col-sm-6 footer-icon">
                <span>Payment:</span><br>
                <img src="{{ asset('assets/img/visa1.png') }}"/>
                <img src="{{ asset('assets/img/mastercard1.png') }}"/>
                <img src="{{ asset('assets/img/doku1.png') }}"/>
            </div>
            <div class="col-sm-6 footer-icon-right">
                <img src="{{ asset('assets/img/appstore.png') }}"/>
                <img src="{{ asset('assets/img/googleplay.png') }}"/>
            </div>
        </div>
    </div>

    <div class="col-sm-12 footer-copy text-center">
        <span>Member of Garuda Indonesia</span>
    </div>

    <!-- Sidebar Start -->
    <nav class="nav1">
        <div class="logo-side">
            <img src="{{asset('assets/img/logo-side.png')}}" class="header-logo" />
        </div>
        <ul id="#sidebar" class="sidebar-set">
            <li ><a href="#"><strong style="color:white;">HOME</strong></a></li>
            <li ><a href="#"><strong style="color:white;">SHOP</strong></a></li>
            <li ><a href="#"><strong style="color:white;">OWN DESIGN</strong></a></li>
            <li ><a href="#"><strong style="color:white;">GALERY</strong></a></li>
            <li ><a href="#"><strong style="color:white;">BRAND</strong></a></li>
        </ul>
    </nav>
    <!-- Sidebar End -->

    <!-- Modal Start -->

    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <ul class="nav nav-pills">
                        <li id="login"><a href="#" style="padding:10px 15px;" onclick="getlogin()">Login</a></li>
                        <li id="register"><a href="#" style="padding:10px 15px;" onclick="getregist()">Register</a></li>
                    </ul>
                </div>
                <div class="modal-body" id="changebody">
                </div>
                <div class="modal-footer">
                    Dengan login ke akun Anda, Anda telah menyetujui Kebijakan Privasi Citilink
                </div>
            </div>

        </div>
    </div>
    <!-- Modal End -->

    <script type="text/javascript">
        $(window).load(function() {
        	$(".loader").fadeOut("normal");
        });
    </script>

    <script type="text/javascript">
    $( window ).scroll(function() {
        if($(window).width() > 782){
            if ($(this).scrollTop() > 100) {
                $('.header-head').css('padding-top','10px');
                $('.header-head').css('padding-bottom','10px');
                $('.nav-tabs.nav-justified>li>a>img').css('width','30px');
                $('.nav-tabs.nav-justified>li>a>img').css('height','30px');
            } else {
                $('.header-head').css('padding-top','2%');
                $('.header-head').css('padding-bottom','2%');
                $('.nav-tabs.nav-justified>li>a>img').css('width','50px');
                $('.nav-tabs.nav-justified>li>a>img').css('height','50px');
            }
        }
    });
    </script>

    <script type="text/javascript">
    (function() {
        var bodyEl = $('body');
        $('.nav-toggle-btn').click(function(e) {
            e.stopPropagation();
            bodyEl.toggleClass('active-nav');

        });

        $('#myDiv').click(function(e){
            $('#myDiv').removeClass("active-nav");

        });
    })();
    </script>

    <script type="text/javascript">
    var today = new Date();

    $( ".datepick" ).datepicker({
        startDate: today,
    });
<<<<<<< HEAD


// $(function() {
//    $('#datetimepicker1').datetimepicker({
//      language: 'pt-BR'
//    });
//  });
</script>
=======
    </script>

    <script type="text/javascript">
    function getlogin(){
        $('#login').addClass('active');
        $('#register').removeClass('active');
        $('#changebody').load('{{url('getlogin')}}');
    }

    function getregist(){
        $('#register').addClass('active');
        $('#login').removeClass('active');
        $('#changebody').load('{{url('getregist')}}');
    }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $(document).ajaxStart(function(){
                  $('.loading').show();
              })
              .ajaxStop(function(){
                  $('.loading').fadeOut("normal");
              })
              .ajaxComplete(function(){
                  $('.loading').fadeOut("normal");
              })
              .ajaxError(function(){
                  $('.loading').fadeOut("normal");
              })
              .ajaxSuccess(function(){
                  $('.loading').fadeOut("normal");
              });
          })
      </script>
>>>>>>> bbb814f4ac7a6e38692643e0f06561a59847d0f7

</body>
</html>
