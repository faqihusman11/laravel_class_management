@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>List Teachers</h3>
    <hr/>
    @if(count($teachers) > 0)
    <table class="table table-hover table-striped table-responsive">
      <thead class="thead text-center">
        <tr>
          <th scope="col" style="width: 5%">No.</th>
          <th scope="col" style="width: 35%">Name</th>
          <th scope="col" style="width: 20%">Age</th>
          <th scope="col" style="width: 20%">Gender</th>
          <th scope="col" style="width: 5%"></th>
          <th scope="col" style="width: 5%"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($teachers as $teacher)
        <tr>
          <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
          <td class="align-middle">{{ $teacher->teacher_name }}</td>
          <td class="align-middle">{{ $teacher->teacher_age }}</td>
          <td class="align-middle">{{ $teacher->teacher_gender }}</td>
          <td class="align-middle">
            <a href="{{ URL('/editTeacher') }}/{{ $teacher->id }}" class="btn btn-info px-4 mt-2 btn-block">
              Edit
            </a>
          </td>
          <td class="align-middle">
            <form method="post" action="deleteTeacher">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $teacher->id }}">
              <button type="submit" class="btn btn-danger px-3 mt-2 btn-block" onclick="return confirm('Are you sure?');">
                Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $teachers->render() }}
    @else
      <p>No Data</p>
    @endif
    <hr/>
    <div class="form-group">  
      <a href="/createTeacher" class="btn btn-success mt-2 btn-block">Add Teacher</a>
    </div>
  </div>
</div>
@endsection