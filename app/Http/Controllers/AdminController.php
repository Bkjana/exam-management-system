<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use App\Repositories\Interfaces\AdminRepoInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminRepoInterface $adminRepoInterface;

    public function __construct(AdminRepoInterface $adminRepoInterface) {
        $this->adminRepoInterface = $adminRepoInterface;
    }


    function index() {
        $arr=[];
        $arr['total_student'] = User::where('role','student')
                                ->count();
        $arr['total_teacher'] = User::where('role','teacher')
                                ->count();
        $arr['total_subject'] = Subject::count();
        $arr['total_exam'] = Exam::count();
        
        return view("admin.index",['count'=>$arr]);
    }

    function logout() {
        session()->remove('admin');
        return view("login");
    }

    function studentView() {
        $students = $this->adminRepoInterface->getAllStudentWithNumberOfSubjectAndExam();
        return view('admin.student',['students'=>$students]);
    }

    function teacherView(){
        $teachers = $this->adminRepoInterface->getAllTeacherWithNumberOfSubjectAssign();
        return view('admin.teacher',['teachers'=>$teachers]);
    }

    function subjectView() {
        $subjects = $this->adminRepoInterface->getAllSubjectWithNumberOfStudent();        
        return view('admin.subject',["subjects"=>$subjects]);
    }

    function examView() {
        $exams = $this->adminRepoInterface->getAllExamWithNumberOfStudent();
        
        return view("admin.exam",["exams"=>$exams]);

    }
}
