@extends('layouts.admin_login_layout')

@section ('content')
<h3>Login</h3>
<form method="post" class="login-form">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <div class="col-md-offset-1">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-default">Cancel</button>
    </div>
</form>
@endsection

@section('styles')
    @parent

    <style>
        .login-form {
            background: #CAD9EC;
            padding: 20px;
            border-radius: 7px;
        }
    </style>
@endsection