@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>Create Student</h3>
    <hr/>
    <form method="POST" action="{{ URL('/addStudent') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group mb-4">
        <label class="font-weight-bold">Name</label>
        <input class="form-control" type="text" name="student_name" placeholder="Enter Name">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('student_name') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Age</label>
        <input class="form-control" type="text" name="student_age" placeholder="Enter Age">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('student_age') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Gender</label>
        <select class="form-control" name="student_gender">
          <option value="0">-- Select Gender --</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('student_gender') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-4">
        <label class="font-weight-bold">Classroom</label>
        <select class="form-control" name="classroom_id">
          <option value="0">-- Select Classroom --</option>
          @if(count($classrooms) > 0)
            @foreach ($classrooms as $classroom)
              <option value="{{ $classroom->id }}">{{ $classroom->class_name }}</option>
            @endforeach
          @endif
        </select>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('classroom_id') }}
          </span>
        </small>
      </div>
      <hr/>
      <div class="form-group">  
        <button class="btn btn-primary mt-4 btn-block" type="submit">Add</button>
      </div>
    </form>
  </div>
</div>
@endsection