@extends('../layout/main')

@push('title')
    Teacher Home
@endpush

@section('main-section')
    <x-navbar homeName="{{session('teacher')->name}}" homeLink="/teacher" subjectLink="/teacher/subject" examLink="/teacher/exam" logoutLink="/teacher/logout" />
    <h1 class="text-center">Teacher Dashbord</h1>
<div class="d-flex justify-content-between">
    <div class="scrollable-container">
        <h4 class="text-center">Your Subject</h4>
        <div class="font-weight-bold"> Total: {{count($subjects)}}</div>
        <ul>
            @foreach ($subjects as $subject)
                <li class="mt-1">{{$subject->subject}}</li>
            @endforeach
        </ul>
    </div>
    <div class="scrollable-container">
        <h4 class="text-center">Exam Taken By You</h4>
       <div class="font-weight-bold"> Total: {{count($exams)}}</div>
        <ul>
            @foreach ($exams as $exam)
                <li class="mt-1">{{$exam->exam_name}} of {{$exam->subject->subject}} Created On {{$exam->created_at}} Held On {{$exam->start_time}} To {{$exam->end_time}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection