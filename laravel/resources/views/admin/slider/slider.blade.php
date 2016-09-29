@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Slider List
    </h1>

    <ol class="breadcrumb">
      <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Slider List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <!-- <li class="active"><a href="{{ url('/admin/slider-list') }}">Slider List</a></li> -->
            <li class="pull-right"><a href="{{ url('/admin/slider/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Slider</a></li>
            <!-- <li><a href="{{ url('/admin/product/product-category') }}">Product Category</a></li> -->
          </ul>
          @if(Session::has('success-addslide'))
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get('success-addslide') }}
              </div>
           @endif
           @if(Session::has('success-delslide'))
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   {{ Session::get('success-delslide') }}
               </div>
            @endif
            @if(Session::has('success-editslide'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success-editslide') }}
                </div>
             @endif
          <div class="tab-content" style="overflow: auto">

                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Enable</th>
                      <th>Slider Image</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($slider as $slider1)
                    <tr>
                      <td>{{ $slider1->slider_id }}</td>
                      <td>
                            <?php if($slider1->slider_enable == 1){ ?>
                            <div class="label label-success"><i class="fa fa-check"></i></div>

                            <?php } else { ?>

                            <div class="label label-danger"><i class="fa fa-times"></i></div>
                            <?php } ?>
                      </td>
                      <td><img src="<?php echo nl2br($slider1->slider_img)?>" class="img-responsive;" style="max-width:200px;max-height:200px;"/></td>
                      <td>{{ $slider1->created_at }}</td>
                      <td class="btn-group">
                        <a href="{{ url('/admin/slider/'.$slider1->slider_id.'/edit') }}" title="Edit" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                        <a href="#" title="Delete" data-toggle="tooltip" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')) location.href='{{ url('/admin/slider-delete/'.$slider1->slider_id.'') }}'"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Enable</th>
                      <th>Slider Image</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </div>
    </div><!-- /.row (main row) -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
