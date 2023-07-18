@extends('../layout/main')

@push('title')
    Student Home
@endpush

@section('main-section')
    <x-navbar homeName="{{session('student')->name}}" homeLink="/student" subjectLink="/student/subject" examLink="/student/exam" logoutLink="/student/logout" />
    <h1>Student Page</h1>
@endsection