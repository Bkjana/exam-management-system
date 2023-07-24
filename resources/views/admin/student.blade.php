@extends('../layout/main')

@push('title')
    Admin DashBoard
@endpush

@section('main-section')
    <x-navbar homeName="{{ session('admin')->name }}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam"
        logoutLink="/admin/logout" profileLink="/admin/profile" />
    <h1 class="text-center">All Students</h1>
    <div class="d-flex justify-content-between m-2">
        @if (isset($past))
            <a href="/admin/student" class="btn btn-outline-info">Show All Student</a>
        @else
            <a href="/admin/student/past" class="btn btn-outline-info">Show Past Student</a>
        @endif

        <form action="/admin/student/studentSearch" method="get" id="studentSerach">
            <input type="text" name="search" id="studentSearchInput">
            <input type="submit" class="btn">
        </form>
    </div>
   
    <div id="studentTableBody">
        @include('admin.studentTable')
    </div>
@endsection
