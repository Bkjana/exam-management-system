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


    <input type="hidden" name="role" value="student">



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


    <div class="form-group">
        <input type="submit" name="create" value="create" class="btn btn-primary" id="creteComplete" >
    </div>
</form>

        <div class="d-flex flex-row-reverse mr-3" id="button">
            <a class="btn btn-outline-info" href="/">Go To Home</a>
         </div>
@endsection


