<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Citilink</title>

        <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-2.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    </head>
    <body>
        <div style="width:100%" id="changebutton">
            <a href="#" onclick="changeimg()"><img src="{{asset('assets/img/home citilink.png')}}" class="img-responsive" /></a>
        </div>

        <script type="text/javascript">
            function changeimg(){
                $('#changebutton').html('<img src="{{asset("assets/img/home citilink 2(managebooking).png")}}" class="img-responsive" />');
            }
        </script>

    </body>
</html>
