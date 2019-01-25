<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Classroom List PDF</title>
</head>
<body>
  <h1 class='display-5'>Classroom List</h1>
  <hr/>
  <div>
    <table class="table table-bordered table-striped table-responsive">
      <thead class="thead text-center">
        <tr>
          <th scope="col" style="width: 10%">No.</th>
          <th scope="col" style="width: 50%">Classroom Name</th>
          <th scope="col" style="width: 20%">Teacher</th>
          <th scope="col" style="width: 20%">Students</th>
        </tr>
      </thead>
      <tbody>
        @foreach($classrooms as $classroom)
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>