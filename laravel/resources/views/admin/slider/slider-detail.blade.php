@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Slider
            <small>Edit</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Slider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-sm-12 box box-solid">
                <div class="col-md-6 col-sm-6">
                    <form class="form-horizontal" action="{{action('SliderController@update')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="slider_id" value="{{ $slider->slider_id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Slider Image</label>
                                <div class="col-sm-9">
                                    <a href="{{asset('assets/filemanager/dialog.php?type=1&field_id=img')}}" class="btn iframe-btn btn-success" type="button" style="margin-bottom:10px;"><i class="ion ion-android-camera"> Slider Image</i></a><br/>
                                    <img src="<?php echo nl2br($slider->slider_img)?>" id="previmg" class="img-responsive" style="max-width:500px;max-height:500px;"/><br/>
                                    <input type="hidden" name="slider_img" class="form-control" id="img" value="{{ $slider->slider_img }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Enable</label>
                                <div class="col-sm-9">
                                    @if($slider->slider_enable == 1)
                                    <input type="checkbox" name="enable" checked="1">
                                    @else
                                    <input type="checkbox" name="enable">
                                    @endif
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
