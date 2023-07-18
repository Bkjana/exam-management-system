@extends('../layout/main')

@push('title')
    Teacher Home
@endpush

@section('main-section')
    <x-navbar homeLink="/teacher" subjectLink="/teacher/subject" examLink="/teacher/exam" logoutLink="/teacher/logout" />
    <h1>Teacher Page</h1>
@endsection