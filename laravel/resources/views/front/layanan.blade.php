@extends('master.frontapp')
@section('content')

<link href="{{ asset('assets/css/stylesyehbi.css') }}" rel="stylesheet">
<br>
<br>
<div class="container"><br><br>
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
        <div class="text-center bs-wizard-stepnum"><img src="{{asset('assets/img/img2/sedan.png')}}" alt="" height="20px"></div>
        <div class="progress" style="margin: 17px 0;"><div class="progress-bar"></div></div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center"><font color="#32bb4c">Layanan Tambahan</font></div>
      </div>

      <div class="col-xs-4 bs-wizard-step active"><!-- complete -->
      <div class="text-center bs-wizard-stepnum">&nbsp;</div>
      <div class="progress"><div class="progress-bar"></div></div>
      <a href="#" class="bs-wizard-dot"></a>
      <div class="bs-wizard-info text-center not-active">Pembayaran</div>
    </div>
  </div>

</div>
</div><br><br><br>
<div class="row">
<div class="col-sm-5">
  <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" height="300px">
</div>
<div class="col-sm-7">
  <div class="row">
    <div class="col-sm-8">
      <h4 style="margin-bottom: 15px;">Pesanan Anda</h4>
      <table style="">
        <tbody>
          <tr>
          <td colspan="" rowspan="" headers=""><img src="{{asset('assets/img/img2/rental.png')}}" alt=""></td>
            <td> Paket Rental</td>
            <td colspan="" rowspan="" headers="" style="padding-left: 65px;color: #32bb4c; font-weight: bold;">:&nbsp;25 Hour(s)</td>
          </tr>
        </tbody>
      </table>
      <table style="">
        <tbody>
          <tr>
          <td colspan="" rowspan="" headers=""><img src="{{asset('assets/img/img2/jemput.png')}}" alt=""></td>
            <td>Waktu Penjemputan</td>
            <td colspan="" rowspan="" headers="" style="padding-left: 17px;color: #32bb4c; font-weight: bold;">: 11-03-2016 06:00</td>
          </tr>
        </tbody>
      </table>
      <table style="">
        <tbody>
          <tr>
          <td colspan="" rowspan="" headers=""><img src="{{asset('assets/img/img2/jam.png')}}" alt=""></td>
            <td>Waktu Pengembalian</td>
            <td colspan="" rowspan="" headers="" style="padding-left: 10px;color: #32bb4c; font-weight: bold;">: 24-03-2016 18.00</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-4">
      <h4 style="margin-bottom: 15px;">Harga Sewa Mobil</h4>
      <div class="product--price">
        <span class="product--price_price"><p class="harga">IDR . 320.000</p></span>
      </div>
    </div>

    </div> <!-- row -->
    <div class="row ">
      <div class="col-sm-12">
        <hr>
        <h4 style="color: #32bb4c; font-weight: bold; margin-bottom: 20px;">Pilih Layanan Tambahan Service</h4>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-xs-5 col-sm-4 img-icon">
            <img src="{{asset('assets/img/img2/botol.png')}}" alt="" align="center">
          </div>
          <div class="col-xs-7 col-sm-8">
            <p class="tambahan">Mineral Water</p>
            <p class="tambahan1">(&commat;IDR 4,000)</p>
            <select name="" id="" class="option form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
          </div><!-- img -->
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-xs-5 col-sm-4 img-icon">
              <img src="{{asset('assets/img/img2/jagung.png')}}" alt="" align="center">
            </div>
            <div class="col-xs-7 col-sm-8">
              <p class="tambahan">Snack</p>
              <p class="tambahan1">(&commat;IDR 8,000)</p>
              <select name="" id="" class="option form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            </div><!-- img -->
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-xs-5 col-sm-4 img-icon ">
                <img src="{{asset('assets/img/img2/koran.png')}}" alt="" class="">
              </div>
              <div class="col-xs-7 col-sm-8">
                <p class="tambahan">Magazine</p>
                <p class="tambahan1">(&commat;IDR 0)</p>
                <select name="" id="" class="option form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              </div><!-- img -->
            </div>
            </div><!-- row layanan -->
            <div class="row">
              <div class="col-sm-6">
                <h5 style="margin-top: 15px; margin-bottom: 15px @media screen and (min-width: 768px)">Payment with :</h5>
                <img src="{{asset('assets/img/img2/Visa_logo.png')}}" alt="" width="75" height="30"> <img src="{{asset('assets/img/img2/mastercard.png')}}" alt="" width="50" height="30"><img src="{{asset('assets/img/img2/doku-logo.png')}}" alt="" width="30" height="30">
              </div>
              <div class="col-sm-6 pesan-button">
              <button type="submit" value="Pesan" class="btn green-sea-flat-button">Pesan</button>
              </div>
              </div><!-- ROW BUTTON-->
            </div>
          </div>
        </div>
      </div>
      @stop
