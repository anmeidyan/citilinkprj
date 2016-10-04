@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Car
            <small>Edit</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Car Slider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-sm-12 box box-solid">
                <div class="col-md-10 col-sm-10">
                    <form class="form-horizontal" action="{{ url('admin/cars/'.$cars->id)}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" placeholder="Name" value="{{$cars->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Seat</label>
                                <div class="col-sm-9">
                                    <input type="number" name="seat" value="{{$cars->seat}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Transmition</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="trans">
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Gas</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gas">
                                        <option value="Pertalite">Pertalite</option>
                                        <option value="Pertamax">Pertamax</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-9">
                                    <a href="{{asset('assets/filemanager/dialog.php?type=1&field_id=img')}}" class="btn iframe-btn btn-success" type="button" style="margin-bottom:10px;"><i class="ion ion-android-camera"> Image</i></a><br/>
                                    <img src="<?php echo nl2br($cars->image)?>" id="previmg" class="img-responsive" style="max-width:500px;max-height:500px;"/><br/>
                                    <input type="hidden" name="image" class="form-control" id="img" value="{{ $cars->image }}">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div><!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
