@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>Create Teacher</h3>
    <hr/>
    <form method="POST" action="{{ URL('/addTeacher') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group mb-4">
        <label class="font-weight-bold">Name</label>
        <input class="form-control" type="text" name="teacher_name" placeholder="Enter Name">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_name') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Age</label>
        <input class="form-control" type="text" name="teacher_age" placeholder="Enter Age">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_age') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Gender</label>
        <select class="form-control" name="teacher_gender">
          <option value="">--Select Gender--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_gender') }}
          </span>
        </small>
      </div>
      <hr/>
      <div class="form-group">  
        <button class="btn btn-success mt-4 btn-block" type="submit">Add</button>
      </div>
    </form>
  </div>
</div>
@endsection