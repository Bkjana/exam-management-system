@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
<x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" />
    <h1 class="text-center">All Teachers</h1>
    <table class="table table-striped text-center border">

        <thead>
            <tr>
                <th scope="col">Teacher Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Subject Assign</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @if (isset($teachers))
              @foreach ($teachers as $teacher)
                  <tr>
                    <td>{{$teacher->id}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->mobile}}</td>
                    <td>{{$teacher->address}}</td>
                    <td>{{$teacher->teacher_count}}</td>
                    {{-- <td>{{$student->exam_count}}</td> --}}
                    <td class="d-flex">
                      <a href="/admin/teacher/edit/{{$teacher->id}}" class="btn btn-outline-info">Edit</a>
                      <a href="/admin/teacher/delete/{{$teacher->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    
                  </tr>
              @endforeach
          @endif
        </tbody>
@endsection