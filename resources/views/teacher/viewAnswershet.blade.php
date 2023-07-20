@extends('../layout.main')

@push('title')
    Teacher Subjects
@endpush

@section('main-section')
    <x-navbar homeName="{{ session('teacher')->name }}" homeLink="/teacher" subjectLink="/teacher/subject"
        examLink="/teacher/exam" logoutLink="/teacher/logout" />
    @if (count($answerFiles)==0)
        <h3 class="text-center text-danger">There Is No File</h3>
    @else
        <h3 class="text-success text-center">Exam: {{$exam->exam_name}}</h3>
        <div class="container">
            <div>Total Student: {{count($answerFiles)}}</div>
            <ul class="mt-5">
                @foreach ($answerFiles as $file)
                    <li><a href="{{asset($file)}}" target="_blank" rel="noopener noreferrer">{{str_replace("storage/answer/exam-16","",$file)}}</a></li>
                @endforeach
            </ul>

            <a href="{{asset('storage/exam/exam'.$exam->id.'.pdf')}}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-info mt-3">Show Question Paper</a>
        </div>
    @endif
@endsection