<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\StudentRepoInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentRepoInterface $studentRepoInterface;

    public function __construct(StudentRepoInterface $studentRepoInterface) {
        $this->studentRepoInterface = $studentRepoInterface;
    }
    function index() {
        $notEnrolledSubject =$this->studentRepoInterface->subjectsThatAreStudentNotEnrolled();
        $upcomigExamsThatAreNotEnrolled = $this->studentRepoInterface->upcomingExamOfStudent();
        return view("student.index",['notEnrolledSubjects'=>$notEnrolledSubject,'upcomigExamsThatAreNotEnrolled'=>$upcomigExamsThatAreNotEnrolled]);
    }
    function logout() {
        session()->remove('student');
        return view("login");
    }
    function subject() {
        $Carbon=new Carbon;
        $subjectsEnrolled = $this->studentRepoInterface->subjectsThatAreStudentEnrolled();
        return view("student.subject",compact('subjectsEnrolled','Carbon'));
    }
    function exam(){
        $onGoingExam = $this->studentRepoInterface->geOnGoingExam();
        return view("student.exam",compact('onGoingExam'));
    }
    function saveAnswerPaper(Request $request){
        $request->validate([
            'end_time'=>'required|after:now',
            'exam_id'=>'required|numeric',
            'answerpaper'=>'required|mimes:pdf|max:2048'
        ]);
        $this->studentRepoInterface->saveAnswerPaper($request);
        return redirect("/student");
    }

    function enrolledExam($id){
        $this->studentRepoInterface->enrolledExam($id);
        return redirect("/student");
    }
    function enrolledSubject($id){
        $this->studentRepoInterface->enrolledSubject($id);
        return redirect("/student");
    }

}
