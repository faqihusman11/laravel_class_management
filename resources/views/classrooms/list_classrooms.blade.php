@extends('layouts.template')

@section('content')
<div class="row justify-content-md-center p-5">
  <div class="col-md-8 p-5 shadow" style="background:#fff;">
    <h3>List Classrooms</h3>
    <hr/>
    @if(count($classrooms) > 0)
    <a href="{{ URL('/downloadPDF') }}" class="btn btn-secondary px-3 mb-3">Download PDF</a>
    <table class="table table-hover table-striped table-responsive">
      <thead class="thead text-center">
        <tr>
          <th scope="col" style="width: 5%">No.</th>
          <th scope="col" style="width: 50%">Classroom Name</th>
          <th scope="col" style="width: 20%">Teacher</th>
          <th scope="col" style="width: 20%">Students</th>
          <th scope="col" style="width: 5%"></th>
          <th scope="col" style="width: 5%"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classrooms as $classroom)
        <tr>
          <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
          <td class="align-middle">{{ $classroom->class_name }}</td>
          <td class="align-middle">
            @if($classroom->teacher->teacher_gender == "Male")
              Mr. {{ $classroom->teacher->teacher_name }}
            @elseif($classroom->teacher->teacher_gender == "Female")
              Mrs. {{ $classroom->teacher->teacher_name }}
            @endif
          </td>
          <td class="align-middle">
            @if(count($classroom->students) > 0)
              <ul>
                @foreach( $classroom->students as $student)
                  <li>{{ $student->student_name }}</li>
                @endforeach
              </ul>
            @else
              <p class="font-weight-bold text-center">-</p>
            @endif
          </td>
          <td class="align-middle">
            <a href="{{ URL('/editClassroom') }}/{{ $classroom->id }}" class="btn btn-info px-4 mt-2 btn-block">
              Edit
            </a>
          </td>
          <td class="align-middle">
            <form method="post" action="deleteClassroom">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $classroom->id }}">
              <button type="submit" class="btn btn-danger px-3 mt-2 btn-block" onclick="return confirm('Are you sure?');">
                Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $classrooms->render() }}
    @else
      <p>No Data</p>
    @endif
    <hr/>
    <div>
      <a href="/createClassroom" class="btn btn-danger mt-2 btn-block">Add Classroom</a>
    </div>
  </div>
</div>
@endsection