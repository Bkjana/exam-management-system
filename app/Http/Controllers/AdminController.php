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
    function subjectAdd(){
        $teacher = $this->adminRepoInterface->getAllTeacher();
        return view("admin.subjectSave",["teachers"=>$teacher]);
    }
    function subjectSave(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects',
            'assign_teacher'=>'required|numeric|not_in:0'
        ]);
        $this->adminRepoInterface->saveSubject($request);
        return redirect("/admin/subject");
    }
    function subjectEdit($id) {
        $subject = $this->adminRepoInterface->getSubject($id);
        $teachers = $this->adminRepoInterface->getAllTeacher();
        return view("admin.subjectEdit",['subject'=>$subject, 'teachers'=>$teachers]);
    }
    function subjectEditSave(Request $request) {
        $request->validate([
            'subject'=>'required',
            'assign_teacher'=>'required|numeric|not_in:0'
        ]);
        $this->adminRepoInterface->editSubject($request);
        return redirect("/admin/subject");
    }
    function subjectDelete($id){
        $this->adminRepoInterface->deleteSubject($id);
        return redirect("/admin/subject");
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
