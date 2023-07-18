@extends('layout/main')

@push('title')
    LogIn Page
@endpush   

@section('main-section')
    <h1 class="text-center">LogIn Page</h1>
    <form method="POST" action="/" class="container col-6 mt-5 bg-dark text-white p-5">
        @csrf
        <div class="form-group">
        <label for="emailormobile">Email address Or Mobile Number:</label>
        <input type="text" class="form-control" id="emailormobile" aria-describedby="emailHelp" placeholder="Enter email Or Mobile" name="emailormobile" value={{old('emailormobile')}}>
        </div>
        <span class="text-danger">
            @error('emailormobile')
                {{ $message }}
            @enderror
        </span>
        <div class="form-group">
            <label class="form-check-label" for="role">Select Your Role:</label>
            <select name="role" id="role" class="form-control">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
            </select>
            <span class="text-danger">
                @error('role')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
        <div class="text-danger">
            @isset($loginerror)
                {{$loginerror}}
            @endisset
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/register" class="btn btn-outline-primary">Register</a>
        </div>
    </form>
@endsection