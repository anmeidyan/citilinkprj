@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Edit</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Blog</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-sm-12 box box-solid">
                <div class="col-md-10 col-sm-10">
                    <form class="form-horizontal" action="{{ url('admin/blogs/'.$blogs->id)}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{$blogs->title}}" id="addtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">URL</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" placeholder="URL" class="form-control" value="{{$blogs->url}}" id="addurl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" name="desc" placeholder="Description" class="form-control" value="{{$blogs->description}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Content</label>
                                <div class="col-sm-9">
                                    <input type="text" name="content" class="texteditor" value="{{$blogs->content}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Blog Image</label>
                                <div class="col-sm-9">
                                    <a href="{{asset('assets/filemanager/dialog.php?type=1&field_id=img')}}" class="btn iframe-btn btn-success" type="button" style="margin-bottom:10px;"><i class="ion ion-android-camera"> Image</i></a><br/>
                                    <img src="<?php echo nl2br($blogs->image)?>" id="previmg" class="img-responsive" style="max-width:500px;max-height:500px;"/><br/>
                                    <input type="hidden" name="image" class="form-control" id="img" value="{{ $blogs->image }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top:0px;">Enable</label>
                                <div class="col-sm-9">
                                    @if($blogs->enable == 1)
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
