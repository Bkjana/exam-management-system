@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
<x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" />
    <h1 class="text-center">All Teachers</h1>

    <div class="d-flex justify-content-between m-3">
        @if (isset($past))
        <a href="/admin/teacher" class="btn btn-outline-info">Show All Teacher</a>
        @else        
        <a href="/admin/teacher/past" class="btn btn-outline-info">Show Past Teacher</a>
        @endif

        <a href="/admin/teacher/unverified" class="btn btn-outline-info">Show Unverified Teacher</a>

    </div>
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
                    @if (isset($past))    
                    <td class="d-flex">
                      <a href="/admin/teacher/restore/{{$teacher->id}}" class="btn btn-outline-info">Restore</a>
                      <a href="/admin/teacher/permanentdelete/{{$teacher->id}}" class="btn btn-outline-danger">Permanent Delete</a>
                    </td>
                    @else   
                    <td class="d-flex">
                      <a href="/admin/teacher/delete/{{$teacher->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    @endif
                    
                  </tr>
              @endforeach
          @endif
        </tbody>
@endsection