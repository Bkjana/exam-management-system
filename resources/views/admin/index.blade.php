@extends('../layout/main')

@push('title')
    Admin Home
@endpush

@section('main-section')
    <x-navbar homeName="{{session('admin')->name}}" homeLink="/admin" subjectLink="/admin/subject" examLink="/admin/exam" logoutLink="/admin/logout" />

        <h3 class="text-center mt-2 mb-2 border-top border-bottom border-secondary p-2 rounded table-hover">Admin Dashboard</h3>
        <div class="row m-3">
            <x-card cardName="Student" cardTitle="{{$count['total_student']}}" cardDesc="Students Are Connected" cardLinkName="Go To Student Portal" cardLink="/admin/student"/>

            <x-card cardName="Teacher" cardTitle="{{$count['total_teacher']}}" cardDesc="Teacher Are Connected" cardLinkName="Go To Teacher Portal" cardLink="/admin/teacher"/>
        </div><div class="row m-3">     
            <x-card cardName="Subject" cardTitle="{{$count['total_subject']}}" cardDesc="Subject Are Added" cardLinkName="Go To Subject Portal" cardLink="/admin/subject"/>

            <x-card cardName="Exam" cardTitle="{{$count['total_exam']}}" cardDesc="Exams Are Conducted" cardLinkName="Go To Exam Portal" cardLink="/admin/Exam"/>

        </div>
@endsection