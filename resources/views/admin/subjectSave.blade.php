@extends('../layout/main')

@push('title')
    Subject Add
@endpush

@section('main-section')
<h2 class="text-center">Save New Subject</h2>
<form class="container col-10 m-5 border p-3" method="POST" action="/admin/subject/add">
    @csrf
    <div class="form-group">
      <label for="name">Enter Subject Name</label>
      <input type="text" class="form-control" id="name" name="subject" placeholder="Name" value="{{old('name')}}">
      <span class="text-danger">
        @error('subject')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="teacher">Select Teacher: </label>
      <select class="form-control" id="adminteacherAdd" name="assign_teacher">
        <option value="0">.....select......</option>
        @isset($teachers)
            @foreach ($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
        @endisset
      </select>
      <span class="text-danger">
        @error('assign_teacher')
            {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Save Subject">
      </div>
  </form>
@endsection