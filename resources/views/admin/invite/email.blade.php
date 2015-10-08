@extends('layouts.admin_layout') 

@section ('content') 
<h3>Please input email in the left and corresponding name in the right</h3>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <div class="col-sm-4">
      <input type="email" class="required email form-control" placeholder="Email" name="invite[email][]">
    </div>
    <div class="col-sm-4">
      <input type="text" class="required form-control" placeholder="Name" name="invite[name][]">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <input type="email" class="form-control" placeholder="Email" name="invite[email][]">
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Name" name="invite[name][]">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <input type="email" class="form-control" placeholder="Email" name="invite[email][]">
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Name" name="invite[name][]">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <input type="email" class="form-control" placeholder="Email" name="invite[email][]">
    </div>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Name" name="invite[name][]">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-default">Send</button>
    </div>
  </div>
</form>
@endsection