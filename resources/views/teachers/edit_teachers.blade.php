@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>Edit Teacher</h3>
    <hr/>
    <form method="POST" action="{{ URL('/updateTeacher') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $teacher->id }}">
      <div class="form-group mb-4">
        <label class="font-weight-bold">Name</label>
        <input class="form-control" type="text" name="teacher_name" placeholder="Enter Name" value="{{ $teacher->teacher_name }}">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_name') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Age</label>
        <input class="form-control" type="text" name="teacher_age" placeholder="Enter Age" value="{{ $teacher->teacher_age }}">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_age') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Gender</label>
        <select class="form-control" name="teacher_gender">
          <option @if($teacher->teacher_gender == '') selected  @endif value="">--Select Gender--</option>
          <option @if($teacher->teacher_gender == 'Male') selected  @endif value="Male">Male</option>
          <option @if($teacher->teacher_gender == 'Female') selected  @endif value="Female">Female</option>
        </select>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_gender') }}
          </span>
        </small>
      </div>
      <hr/>
      <div class="form-group">  
        <button class="btn btn-success mt-4 btn-block" type="submit">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection