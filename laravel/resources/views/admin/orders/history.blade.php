@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Order History
    </h1>

    <ol class="breadcrumb">
      <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Order History</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
              <br>
            <!-- <li class="active"><a href="{{ url('/admin/slider-list') }}">Slider List</a></li> -->
            <!-- <li class="pull-right"><a href="{{ url('/admin/sliders/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Slider</a></li> -->
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
                      <th>ID</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Booking Code</th>
                      <th>Pick Up</th>
                      <th>Drop Off</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>
                          <?php if($order->ordersStatus == 0) { ?>
                              <div class="label label-primary">Pending</div>
                          <?php } elseif($order->ordersStatus == 1) { ?>
                              <div class="label label-warning">Paid</div>
                          <?php } elseif($order->ordersStatus == 2) { ?>
                              <div class="label label-success">Completed</div>
                          <?php } else {?>
                              <div class="label label-danger">Cancel</div>
                          <?php } ?>
                      </td>
                      <td>{{ $order->customerEmail }}</td>
                      <td>{{ $order->bookingCode }}</td>
                      <td>
                          <?php
                            $mil = $order->pickUpTime;
                            $seconds = $mil / 1000;
                            $pick = date("d F Y H:i",$seconds);
                            echo $pick;
                          ?>
                      </td>
                      <td>
                          <?php
                            $mil = $order->dropOffTime;
                            $seconds = $mil / 1000;
                            $drop = date("d F Y H:i",$seconds);
                            echo $drop;
                          ?>
                      </td>
                      <td class="btn-group">
                          <a href="{{ url('/admin/orders/view/'.$order->id) }}" title="View" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                          <a href="#" title="Cancel" data-toggle="tooltip" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')) location.href='{{ url('/admin/orders/destroy/'.$order->id.'') }}'"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Booking Code</th>
                        <th>Pick Up</th>
                        <th>Drop Off</th>
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
