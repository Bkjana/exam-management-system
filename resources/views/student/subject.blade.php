@extends('../layout.main')

@push('title')
    Student Subjects
@endpush

@section('main-section')
<x-navbar homeName="{{session('student')->name}}" homeLink="/student" subjectLink="/student/subject" examLink="/student/exam" logoutLink="/student/logout" profileLink="/student/profile"/>
    {{-- <div class="container m-2"> --}}
        
        @if (count($subjectsEnrolled)>0)
            <h1 class="text-center">Subjects Enrolled By You</h1>
            <ul class="">
                @foreach ($subjectsEnrolled as $subject)
                    <li >
                      <div class="font-weight-bold">
                        {{$subject->subject}}
                    </div>  
                    
                    <div class="d-flex justify-content-between">
                        <div class="scrollable-container" style="max-height: 200px">
                            <h6 class="text-center"><u>Past Exam</u></h6>
                            <ul>
                                @foreach ($subject->exam->where('start_time','<',$Carbon::now()) as $exam)
                                    <li class="mt-1">{{$exam->exam_name}} Held On {{$exam->start_time}} to {{$exam->end_time}}
                                        @if ($exam->user->find(session()->get('student')->id))
                                        <sup class="text-primary">
                                            Registered
                                        </sup>
                                        @else
                                            <sup class="text-danger">
                                                Not-Regis..
                                            </sup>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="scrollable-container" style="max-height: 200px">
                            <h6 class="text-center"><u>Upcomig Exams</u></h6>
                            <ul>
                                @foreach ($subject->exam->where('start_time','>',$Carbon::now()) as $exam)
                                    <li class="mt-1">{{$exam->exam_name}} Held On {{$exam->start_time}} to {{$exam->end_time}}
                                        @if ($exam->user->find(session()->get('student')->id))
                                        <sup class="text-primary">
                                            Registered
                                        </sup>
                                        @else
                                            <sup class="text-danger">
                                                Not-Regis..
                                            </sup>
                                        @endif
                                    </li>
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