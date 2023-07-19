@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
<x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" />
    <h1 class="text-center">All Students</h1>
    <a href="/admin/student/past" class="btn btn-outline-info">Show Past Student</a>
    <table class="table table-striped text-center border">

        <thead>
            <tr>
                <th scope="col">Student Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Subject Register</th>
                <th scope="col">Exam Register</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @if (isset($students))
              @foreach ($students as $student)
                  <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->mobile}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->subject_count}}</td>
                    <td>{{$student->exam_count}}</td>
                    @if (isset($past))    
                    <td class="d-flex">
                      <a href="/admin/student/restore/{{$student->id}}" class="btn btn-outline-info">Restore</a>
                      <a href="/admin/student/permanentdelete/{{$student->id}}" class="btn btn-outline-danger">Permanent Delete</a>
                    </td>
                    @else   
                    <td class="d-flex">
                      <a href="/admin/student/delete/{{$student->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    @endif
                    
                  </tr>
              @endforeach
          @endif
        </tbody>
@endsection