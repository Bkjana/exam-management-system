<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function index() {
        return view("teacher.index");
    }
    function logout() {
        session()->remove('teacher');
        return view("login");
    }
}
