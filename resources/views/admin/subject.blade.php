@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
<x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" profileLink="/admin/profile"/>
    <h1 class="text-center">All Subjects</h1>
    <a href="/admin/subject/add" class="btn btn-outline-primary mb-1">Add New Subject</a>
    <table class="table table-striped text-center border">

        <thead>
            <tr>
                <th scope="col">Student Id</th>
                <th scope="col">Name</th>
                <th scope="col">Assign Teacher Name With ID</th>
                <th scope="col">Student Registered</th>
                <th scope="col">Exam Taken</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @if (isset($subjects))
              @foreach ($subjects as $subject)
                  <tr>
                    <td>{{$subject->id}}</td>
                    <td>{{$subject->subject}}</td>
                    <td>{{$subject->teacher->id}}. {{$subject->teacher->name}}</td>
                    <td>{{$subject->student_count}}</td>
                    <td>{{$subject->exam_count}}</td>
                    <td class="d-flex">
                      <a href="/admin/subject/edit/{{$subject->id}}" class="btn btn-outline-info">Edit</a>
                      <a href="/admin/subject/delete/{{$subject->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    
                  </tr>
              @endforeach
          @endif
        </tbody>
@endsection