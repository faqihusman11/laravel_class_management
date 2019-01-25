@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>Edit Classroom</h3>
    <hr/>
    <form method="POST" action="{{ URL('/updateClassroom') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{ $classroom->id }}">
      <div class="form-group mb-4">
        <label class="font-weight-bold">Name</label>
        <input class="form-control" type="text" name="class_name" placeholder="Enter Name" value="{{ $classroom->class_name }}">
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('class_name') }}
          </span>
        </small>
      </div>
      <div class="form-group mb-5">
        <label class="font-weight-bold">Teacher</label>
        <select class="form-control" name="teacher_id">
          <option value="0">--Select Teacher--</option>
          @if(count($classroom->teacher) > 0)
            @foreach ($classroom->teacher as $teacher)
              <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
            @endforeach
          @endif
        </select>
        <small class="form-text text-muted">
          <span style="color:#ff0000;">
            {{ $errors->first('teacher_id') }}
          </span>
        </small>
      </div>
      <hr/>
      <div class="form-group">  
        <button class="btn btn-danger mt-5 btn-block" type="submit">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection