<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index() {
        // echo session('student')->name;
        return view("student.index");
    }

    function logout() {
        session()->remove('student');
        return view("login");
    }
}
