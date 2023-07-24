@extends('../layout.main')

@push('title')
    Student Subjects
@endpush

@section('main-section')
<x-navbar homeName="{{session('student')->name}}" homeLink="/student" subjectLink="/student/subject" examLink="/student/exam" logoutLink="/student/logout" profileLink="/student/profile"/>
    <div class="container">
    @if (count($onGoingExam)>0)    
        <h3 class="text-center"><u>Current Exam...</u></h3>
        @foreach ($onGoingExam as $exam)
        <div class="d-flex justify-content-between">
            <h5><u>{{$exam->exam_name}}</u></h5>
            <div>By {{$exam->createdBy->name}}</div>
        </div>
        <div>
            Of Subject: {{ucwords($exam->subject->subject)}}
        </div>
        <div>
            <div>Start Time: {{$exam->start_time}}</div>
            
            <div>Remaining Time: {{Carbon\Carbon::parse($exam->end_time)->diff(Carbon\Carbon::now())->format('%d days, %h hours, %i minutes, %s seconds')}}</div>
            <div>End Time: {{$exam->end_time}}</div>
        </div>

        
            <a href="{{asset('storage/exam/exam'.$exam->id.'.pdf')}}" class="btn btn-primary mt-2" target="-blank">Show Question Paper</a>
            <div>
                <div class="mb-2 mt-2">Upload Your Answer Paper (with 2Mb, If you upload 2nd time 1st answer paper is deleted...)</div>
                <form action="/student/saveAnswerPaper" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="end_time" value="{{$exam->end_time}}">
                    <span class="text-danger">
                        @error('end_time')
                            {{$message}}
                        @enderror
                    </span>
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <span class="text-danger">
                        @error('exam_id')
                            {{$message}}
                        @enderror
                    </span>
                    <input type="file" name="answerpaper" class="btn btn-outline-info">
                    <span class="text-danger">
                        @error('answerpaper')
                            {{$message}}
                        @enderror
                    </span>
                    <input type="submit" value="Upload" class="btn btn-outline-success">

                </form>
                @if (Illuminate\Support\Facades\Storage::exists("public/answer/exam-".$exam->id."student-".session()->get('student')->id.".pdf"))

                    <a href="{{asset('storage/answer/exam-'.$exam->id.'student-'.session()->get('student')->id.'.pdf')}}" target="_blank" rel="noopener noreferrer">Open Your Answer Paper</a>
                    
                @endif
            </div>
        

        <hr color="black">
        @endforeach
    @else
        <h3 class="text-center text-danger mt-5">No Exam Held Now, <small>If held Refresh The Page</small></h3>
    @endif
</div>
@endsection