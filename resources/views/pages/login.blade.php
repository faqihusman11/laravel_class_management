@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>Login</h3>
    <hr/>
    <form method="POST" action="{{ URL('/loginUser') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group mb-4">
        <label class="font-weight-bold">Email address</label>
        <input class="form-control" type="email" name="email" placeholder="Enter Email" autofocus>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('email') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Enter Password">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('password') }}
          </span>
        </small>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="rememberme">
        <label class="form-check-label">Remember Me</label>
      </div>
      <div class="form-group">  
        <button class="btn btn-info mt-5 btn-block" type="submit">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection