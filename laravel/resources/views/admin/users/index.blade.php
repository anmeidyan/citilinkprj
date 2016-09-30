@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users List
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users List</li>
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
                        <li class="pull-right"><a href="{{ url('/admin/users/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a></li>
                        <!-- <li><a href="{{ url('/admin/product/product-category') }}">Product Category</a></li> -->
                    </ul>
                    @if(Session::has('success-adduser'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success-adduser') }}
                    </div>
                    @endif
                    @if(Session::has('success-deluser'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success-deluser') }}
                    </div>
                    @endif
                    @if(Session::has('success-edituser'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success-edituser') }}
                    </div>
                    @endif
                    <div class="tab-content" style="overflow: auto">

                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <?php if($user->level == 1){ ?>
                                            <div class="label label-success">Super Admin</div>
                                        <?php } elseif($user->level == 2) { ?>
                                            <div class="label label-warning">Admin</i></div>
                                        <?php } else { ?>
                                            <div class="label label-primary">Member</i></div>
                                        <?php } ?>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="btn-group">
                                        <form id="{{ $user->id }}" action="{{ url('admin/users/'.$user->id)}}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" title="Edit" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')){ $('#{{ $user->id }}').submit() }"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
