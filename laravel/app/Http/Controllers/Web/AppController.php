<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function getlogin(){
        echo '<div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="'. url("/login") .'">
                '.csrf_field().'

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required autofocus style="border:1px solid #ccc;" value="admin@citilink.com">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required style="border:1px solid #ccc;" value="123456">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>';
    }

    public function getregist(){
        echo '<div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="'. url("/register") .'">
                '.csrf_field().'

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus style="border:1px solid #ccc;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required style="border:1px solid #ccc;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required style="border:1px solid #ccc;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required style="border:1px solid #ccc;">
                    </div>
                </div>

                <div class="form-group hidden">
                    <label class="col-md-4 control-label">Privileges</label>

                    <div class="col-md-6">
                        <select class="form-control" name="level">
                            <option value="0">User</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>';
    }
}
