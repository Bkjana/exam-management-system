@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
<x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" profileLink="/admin/profile"/>
    <h1 class="text-center">All Exams</h1>
    <a href="/admin/exam/add" class="btn btn-outline-primary mb-1">Add New Exam</a>
    <table class="table table-striped text-center border">

        <thead>
            <tr>
                <th scope="col">Exam Id</th>
                <th scope="col">Name</th>
                <th scope="col">Subject Name With ID</th>
                <th scope="col">Sudent Registered</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @if (isset($exams))
              @foreach ($exams as $exam)
                  <tr>
                    <td>{{$exam->id}}</td>
                    <td>{{$exam->exam_name}}</td>
                    <td>{{$exam->subject->id}}. {{$exam->subject->subject}}</td>
                    <td>{{$exam->student_register}}</td>
                    <td>{{$exam->start_time}}</td>
                    <td>{{$exam->end_time}}</td>
                    <td class="d-flex">
                      <a href="/admin/exam/edit/{{$exam->id}}" class="btn btn-outline-info">Edit</a>
                      <a href="/admin/exam/delete/{{$exam->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    
                  </tr>
              @endforeach
          @endif
        </tbody>
@endsection