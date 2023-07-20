@extends('../layout.main')

@push('title')
    Teacher Subjects
@endpush

@section('main-section')
    <x-navbar homeName="{{ session('teacher')->name }}" homeLink="/teacher" subjectLink="/teacher/subject"
        examLink="/teacher/exam" logoutLink="/teacher/logout" />
    {{-- <div class="container m-2"> --}}

    @if (count($subjects) > 0)
        <h1 class="text-center">Subjects That You Are Added:</h1>
        <ul class="">
            @foreach ($subjects as $subject)
                <li>
                    <div class="font-weight-bold">
                        {{ $subject->subject }}
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="scrollable-container" style="max-height: 200px">
                            <h6 class="text-center"><u>Past Exam</u></h6>
                            <ul>
                                @foreach ($subject->exam->where('start_time', '<', Carbon\Carbon::now())->where('created_by', session()->get('teacher')->id)->sortByDesc('start_time') as $exam)
                                    <li class="mt-1">{{ $exam->exam_name }} Held On {{ $exam->start_time }} to
                                        {{ $exam->end_time }} <sup><a href="/teacher/viewAnswershet/{{ $exam->id }}">View
                                            Answer Sheet</a></sup></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="scrollable-container" style="max-height: 200px">
                            <h6 class="text-center"><u>Upcomig Exams</u></h6>
                            <ul>
                                @foreach ($subject->exam->where('start_time', '>', Carbon\Carbon::now())->where('created_by', session()->get('teacher')->id)->sortByDesc('start_time') as $exam)
                                    <li class="mt-1">{{ $exam->exam_name }} Held On {{ $exam->start_time }} to
                                        {{ $exam->end_time }}</li>
                                @endforeach
                            </ul>
                        </div>
                </li>
            @endforeach
        </ul>
    @else
        <h1 class="text-center mt-5">You Are Not Enrolled Any Of Our Subject</h1>
    @endif
    {{-- </div> --}}
@endsection
