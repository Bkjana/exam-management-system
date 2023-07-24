@extends('../layout/main')

@push('title')
    Exam Add
@endpush

@section('main-section')
<x-navbar homeName="{{session('teacher')->name}}" homeLink="/teacher" subjectLink="/teacher/subject" examLink="/teacher/exam" logoutLink="/teacher/logout" profileLink="/teacher/profile"/>
  <h1 class="text-center">Teacher Dashbord</h1>
<h4 class="text-center">Save New Exam</h4>
<form class="container col-10 m-5 border p-3" method="POST" action="/teacher/exam" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Enter Exam Name</label>
      <input type="text" class="form-control" id="name" name="exam_name" placeholder="Name" value="{{old('exam_name')}}">
      <span class="text-danger">
        @error('exam_name')
            {{$message}}
        @enderror
      </span>
    </div>

    <div class="form-group">
      <label for="teacher">Select Subject: </label>
      <select class="form-control" id="adminteacherAdd" name="subject_id">
        <option value="0">.....select......</option>
        @isset($subjects)
            @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject}}</option>
            @endforeach
        @endisset
      </select>
      <span class="text-danger">
        @error('subject_id')
            {{$message}}
        @enderror
      </span>
    </div>

    <div class="form-group">
        <label for="name">Enter Start Time</label>
        <input type="datetime-local" class="form-control" id="name" name="start_time" value="{{old('start_time')}}">
        <span class="text-danger">
          @error('start_time')
              {{$message}}
          @enderror
        </span>
    </div>

    <div class="form-group">
        <label for="name">Enter End Time</label>
        <input type="datetime-local" class="form-control" id="name" name="end_time" value="{{old('end_time')}}">
        <span class="text-danger">
          @error('end_time')
              {{$message}}
          @enderror
        </span>
      </div>    

      <div class="form-group" id="question_paper">
        <label for="exampleFormControlFile1">Upload question Paper (as pdf less then 2MB):</label>
        <input type="file" class="form-control-file" id="resume" name="question_file" value={{ old('question_file') }}>
        <span class="text-danger">
            @error('question_file')
                {{ $message }}
            @enderror
        </span>
      </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Save exam">
      </div>
  </form>
@endsection