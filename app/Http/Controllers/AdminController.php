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
        $arr=$this->adminRepoInterface->index();       
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
    function studentViewPast() {
        $students = $this->adminRepoInterface->getAllStudentFromTrashed();
        return view('admin.student',["students"=>$students,"past"=>"true"]);
    }
    function studentDelete($id){
        $this->adminRepoInterface->studentDelete($id);
        return redirect("/admin/student");
    }
    function studentRestore($id){
        $this->adminRepoInterface->studentRestore($id);
        return redirect("/admin/student/past");
    }
    function studentPermanentDelete($id){
        $this->adminRepoInterface->studentPermanentDelete($id);
        return redirect("/admin/student/past");
    }




    function subjectView() {
        $subjects = $this->adminRepoInterface->getAllSubjectWithNumberOfStudent();        
        return view('admin.subject',["subjects"=>$subjects]);
    }







    function teacherView(){
        $teachers = $this->adminRepoInterface->getAllTeacherWithNumberOfSubjectAssign();
        return view('admin.teacher',['teachers'=>$teachers]);
    }


    function examView() {
        $exams = $this->adminRepoInterface->getAllExamWithNumberOfStudent();
        
        return view("admin.exam",["exams"=>$exams]);

    }
}
