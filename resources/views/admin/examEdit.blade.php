@extends('../layout/main')

@push('title')
    Exam Edit
@endpush

@section('main-section')
<h2 class="text-center">Edit Exam</h2>
<form class="container col-10 m-5 border p-3" method="POST" action="/admin/exam/edit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$exam->id}}">
    <div class="form-group">
      <label for="name">Enter Exam Name</label>
      <input type="text" class="form-control" id="name" name="exam_name" placeholder="Name" value="{{$exam->exam_name}}">
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
                <option value="{{$subject->id}}"
                  @if ($subject->id==$exam->subject_id)
                      selected
                  @endif
                  >{{$subject->subject}}</option>
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
        <input type="datetime-local" class="form-control" id="name" name="start_time" value="{{$exam->start_time}}">
        <span class="text-danger">
          @error('start_time')
              {{$message}}
          @enderror
        </span>
    </div>

    <div class="form-group">
        <label for="name">Enter End Time</label>
        <input type="datetime-local" class="form-control" id="name" name="end_time" value="{{$exam->end_time}}">
        <span class="text-danger">
          @error('end_time')
              {{$message}}
          @enderror
        </span>
      </div>    

      <div class="form-group" id="question_paper">
        <label for="exampleFormControlFile1">Upload question Paper If You Wish Add New Question Paper Other Wise Old Question Paper Is Used.... (as pdf less then 2MB):</label>
        <input type="file" class="form-control-file" id="resume" name="question_file">
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