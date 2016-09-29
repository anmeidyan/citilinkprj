@extends('master.frontapp')
@section('content')

<link href="{{ asset('assets/css/stylesyehbi.css') }}" rel="stylesheet">
<br>
<br>
<div class="container"><br><br>
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
          <select name="sort" id="" class="form-control option-sort">
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
        <div class="col-md-12 col-lg-12" style="padding: 0px 0px; margin-top:20px;">
          <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        <div class="col-md-4 col-sm-6 hover" style="margin-top:20px;">
            <img src="{{asset('assets/img/img2/mobil.png')}}" class="img-responsive" />
            <p class="judul-pilih1">Mobil BR-V</p>
            <ul class="colourswatches">
            <div class="col-xs-3" style="margin-top: -15px;"><p style="color: white;"><i class="fa fa-users"> 6</i></p></div>
            <div class="col-xs-5" style="margin-top: -15px;"><p style="color: white;"><img src="{{asset('assets/img/img2/gigi.png')}}" alt="" height="15px" width="20px"> Automatic</p></div>
            <div class="col-xs-4" style="margin-top: -15px; padding-right:1px; padding-left: 2px;"><p style="color: white;"><img src="{{asset('assets/img/img2/premium.png')}}" alt="" height="17px" width="20px"> Pertamax</p></div>
            </ul>
            <p class="judul-pilih">Harga Mobil</p>
            <p class="judul-pilih">Lama Sewa : 150 jam</p>
            <div class="col-xs-8 harga-pilih">IDR 320.000,00</div>
            <div class="col-xs-4"><a href="{{url('/layanan')}}"><button class="btn green-sea-pesan">Pesan</button></a></div>
        </div>
        </div>
</div>
</div>
@stop
