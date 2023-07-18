@extends('../layout/main')

@push('title')
    Admin Home
@endpush

@section('main-section')
    <x-navbar homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" />
    <h1>Admin Page</h1>
@endsection