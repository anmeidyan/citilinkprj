@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cars List
    </h1>

    <ol class="breadcrumb">
      <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Car List</li>
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
            <li class="pull-right"><a href="{{ url('/admin/cars/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Car</a></li>
            <!-- <li><a href="{{ url('/admin/product/product-category') }}">Product Category</a></li> -->
          </ul>
          @if(Session::has('success'))
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get('success') }}
              </div>
           @endif
           @if(Session::has('delete'))
               <div class="alert alert-danger alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   {{ Session::get('delete') }}
               </div>
            @endif
            @if(Session::has('edit'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('edit') }}
                </div>
             @endif
          <div class="tab-content" style="overflow: auto">

                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th>ID Type</th>
                      <th>Name</th>
                      <th>Transmition</th>
                      <th>Gas</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cars as $car)
                    <tr>
                      <td>{{ $car->type_id }}</td>
                      <td>{{ $car->name}}</td>
                      <td>{{ $car->transmition }}</td>
                      <td>{{ $car->gas }}</td>
                      <td><img src="<?php echo nl2br($car->image)?>" class="img-responsive;" style="max-width:200px;max-height:200px;"/></td>
                      <td class="btn-group">
                        <form id="{{ $car->id }}" action="{{ url('admin/cars/'.$car->id)}}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <a href="{{ url('/admin/cars/'.$car->id.'/edit') }}" title="Edit" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                          <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')){ $('#{{ $car->id }}').submit() }"><i class="fa fa-times"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Transmition</th>
                        <th>Gas</th>
                        <th>Image</th>
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
