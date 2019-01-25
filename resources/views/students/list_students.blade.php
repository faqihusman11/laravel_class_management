@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>List Students</h3>
    <hr/>
    @if(count($students) > 0)
    <table class="table table-hover table-striped table-responsive">
      <thead class="thead">
        <tr>
          <th scope="col" style="width: 5%">No.</th>
          <th scope="col" style="width: 20%">Name</th>
          <th scope="col" style="width: 55%">Age</th>
          <th scope="col" style="width: 20%">Gender</th>
          <th scope="col" style="width: 20%">Classroom</th>
          <th scope="col" style="width: 5%"></th>
          <th scope="col" style="width: 5%"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
          <td class="align-middle">{{ $student->student_name }}</td>
          <td class="align-middle">{{ $student->student_age }}</td>
          <td class="align-middle">{{ $student->student_gender }}</td>
          <td class="align-middle">{{ $student->classroom->class_name }}</td>
          <td class="align-middle">
            <a href="{{ URL('/editStudent') }}/{{ $student->id }}" class="btn btn-info px-4 mt-2 btn-block">
              Edit
            </a>
          </td>
          <td class="align-middle">
            <form method="post" action="deleteStudent">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $student->id }}">
              <button type="submit" class="btn btn-danger px-3 mt-2 btn-block" onclick="return confirm('Are you sure?');">
                Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $students->render() }}
    @else
      <p>No Data</p>
    @endif
    <hr/>
    <div class="form-group">
      <a href="/createStudent" class="btn btn-primary mt-2 btn-block">Add Student</a>
    </div>
  </div>
</div>
@endsection