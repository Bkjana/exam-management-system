<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use App\Repositories\Interfaces\AdminRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
    function login(){
        return view("admin.login");
    }
    function logout() {
        session()->remove('admin');
        return redirect("/");
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
        return back();
    }
    function studentRestore($id){
        $this->adminRepoInterface->studentRestore($id);
        return redirect("/admin/student/past");
    }
    function studentPermanentDelete($id){
        $this->adminRepoInterface->studentPermanentDelete($id);
        return redirect("/admin/student/past");
    }
    function studentSortAscending(){
        
        $students = $this->adminRepoInterface->getAllStudentWithNumberOfSubjectAndExamSortByNameAcs();
        $view = View::make('admin.studentTable', compact('students'))->render();
        return response()->json($view);
    }
    function studentSortDescending(){
        $students = $this->adminRepoInterface->getAllStudentWithNumberOfSubjectAndExamSortByNameDesc();
        $view = View::make('admin.studentTable', compact('students'))->render();
        return response()->json($view);
    }
    function studentSearch($search){
        $students = $this->adminRepoInterface->studentSearch($search);
        $view = View::make('admin.studentTable', compact('students'))->render();
        return response()->json($view);
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







    function examView() {
        $exams = $this->adminRepoInterface->getAllExamWithNumberOfStudent(); 
        return view("admin.exam",["exams"=>$exams]);
    }
    function examAdd(){
        $subject = $this->adminRepoInterface->getAllSubjectWithNumberOfStudent();
        return view("admin.examSave",["subjects"=>$subject]);
    }
    function examSave(Request $request){
        $request->validate([
            'exam_name'=>'required|unique:exams',
            'subject_id'=>'required|numeric|not_in:0',
            'start_time'=>'required|date_format:Y-m-d\TH:i|after:now',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'question_file' => 'required|mimes:pdf|max:2048',
        ]);
        $this->adminRepoInterface->saveExam($request);
        return redirect("/admin/exam");
    }
    function examEdit($id) {
        $subject = $this->adminRepoInterface->getAllSubjectWithNumberOfStudent();
        $exam = $this->adminRepoInterface->getExam($id);
        return view("admin.examEdit",['subjects'=>$subject, 'exam'=>$exam]);
    }
    function examEditSave(Request $request) {
        $request->validate([
            'exam_name'=>'required',
            'subject_id'=>'required|numeric|not_in:0',
            'start_time'=>'required|date_format:Y-m-d\TH:i|after:now',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'question_file' => 'mimes:pdf|max:2048',
        ]);
        $this->adminRepoInterface->editExam($request);
        return redirect("/admin/exam");
    }
    function examDelete($id){
        $this->adminRepoInterface->deleteExam($id);
        return redirect("/admin/exam");
    }







    function teacherView(){
        $teachers = $this->adminRepoInterface->getAllTeacherWithNumberOfSubjectAssign();
        return view('admin.teacher',['teachers'=>$teachers]);
    }
    function teacherViewPast() {
        $teachers = $this->adminRepoInterface->getAllTeacherFromTrashed();
        return view('admin.teacher',["teachers"=>$teachers,"past"=>"true"]);
    }
    function teacherDelete($id){
        $this->adminRepoInterface->teacherDelete($id);
        return back();
    }
    function teacherRestore($id){
        $this->adminRepoInterface->teacherRestore($id);
        return redirect("/admin/teacher/past");
    }
    function teacherPermanentDelete($id){
        $this->adminRepoInterface->teacherPermanentDelete($id);
        return redirect("/admin/teacher/past");
    }
    function teacherAccept($id){
        $this->adminRepoInterface->acceptTeacher($id);
        return back();
    }
    function teacherSort($val){
         $teachers = $this->adminRepoInterface->teacherSort($val);
         return view('admin.teacher',['teachers'=>$teachers]);
    }
    function teacherApproved(){
        $teachers = $this->adminRepoInterface->teacherApproded();
        $approved = 1;
        return view('admin.teacher',compact('teachers','approved'));
    }
    function teacherUnverified() {
        $teachers = $this->adminRepoInterface->getTeacherWhoAreUnverified();
        $approved = 0;
        return view('admin.teacher',['teachers'=>$teachers,'approved'=>$approved]);
    }
    function teacherSearch($val){
        $teachers = $this->adminRepoInterface->teacherSearch($val);
        return view('admin.teacher',compact('teachers'));
    }

    // function teacherTableBody(){
    //     $teachers = $this->adminRepoInterface->getAllTeacherWithNumberOfSubjectAssign();
    //     return view('admin.teacher_table',['teachers'=>$teachers]);
    // }


}
