@extends('../layout/main')

@push('title')
    Student Home
@endpush

@section('main-section')
    <x-navbar homeName="{{session('student')->name}}" homeLink="/student" subjectLink="/student/subject" examLink="/student/exam" logoutLink="/student/logout" />
        <h1 class="text-center">Student Dashbord</h1>
        <div class="d-flex justify-content-between">
            <div class="scrollable-container" style="max-height: 500px">
                <h4 class="text-center">Our Subjects That You Are Not Enrolled</h4>
                <div class="font-weight-bold"> Total: {{count($notEnrolledSubjects)}}</div>
                <ul>
                    @foreach ($notEnrolledSubjects as $subject)
                        <li class="mt-1">{{$subject->subject}} <a href="/student/enrolledSubject/{{$subject->id}}">Enrolled</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="scrollable-container">
                <h4 class="text-center">Our Upcomig Exams Of Your Enrolled Subjects</h4>
               <div class="font-weight-bold"> Total: {{count($upcomigExamsThatAreNotEnrolled)}}</div>
                <ul>
                    @foreach ($upcomigExamsThatAreNotEnrolled as $exam)
                        <li class="mt-1">{{$exam->exam_name}} of {{$exam->subject->subject}} Held On {{$exam->start_time}} To {{$exam->end_time}} <a href="/student/enrolledExam/{{$exam->id}}">Enrolled</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection