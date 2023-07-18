@extends("../layout/main")
@push('title')
    Create New Student
@endpush

@section('main-section')
<h3 class="text-center">Register Page</h3>

<form action="{{ url('/') }}/register" method="post" class="card text-white bg-dark p-2 mb-3 border container" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value={{ old('name') }}>
        <span class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value={{ old('email') }}>
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="form-group">
        <label for="Name">Mobile:</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value={{ old('mobile') }}>
        <span class="text-danger">
            @error('mobile')
                {{ $message }}
            @enderror
        </span>
    </div>


    <div class="form-group">
        <label for="class">Address:</label>
        <input class="form-control" id="address" name="address" type="text" value={{ old('address') }}>
        <span class="text-danger">
            @error('address')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="form-group">
        <label class="form-check-label" for="role" >Select Your Role:</label>
        <select name="role" id="role" class="form-control" onchange="openPDF()" value={{ old('role') }}>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
    </div>



    <div class="form-group">
        <label for="password">password</label>
        <input class="form-control" id="password" name="password" type="password" >
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="form-group">
        <label for="retype_password">Retype Password</label>
        <input class="form-control" id="retype_password" name="retype_password" type="password" >
        <span class="text-danger">
            @error('retype_password')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="form-group" id="teacher-resume">
        <label for="exampleFormControlFile1">Upload Your Resume (as pdf less then 2MB):</label>
        <input type="file" class="form-control-file" id="resume" name="file" value={{ old('file') }}>
        <span class="text-danger">
            @error('file')
                {{ $message }}
            @enderror
        </span>
      </div>


    <div class="form-group">
        <input type="submit" name="create" value="create" class="btn btn-primary" id="creteComplete" >
    </div>
</form>

        <div class="d-flex flex-row-reverse mr-3" id="button">
            <a class="btn btn-outline-info" href="/">Go To Home</a>
         </div>
@endsection


