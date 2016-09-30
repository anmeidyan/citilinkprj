@extends('master.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Add</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-sm-12 box" style="border-top:1px solid #d2d6de;">
                <div class="col-md-6 col-sm-6" style="padding-top:2%;">
                    <form class="form-horizontal" action="{{url('admin/users/')}}" method="post">
                        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <div style="color:red;">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <div style="color:red;">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <div style="color:red;">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Reconfirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirm" placeholder="Reconfirm Password">
                                    @if ($errors->has('password_confirm'))
                                    <div style="color:red;">
                                        {{ $errors->first('password_confirm') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Level</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="level">
                                        <option value="0"> MEMBER </option>
                                        <option value="2"> ADMIN </option>
                                    </select>
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
