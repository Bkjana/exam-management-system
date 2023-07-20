<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface StudentRepoInterface{

    public function subjectsThatAreStudentEnrolled();
    public function subjectsThatAreStudentNotEnrolled();
    public function upcomingExamOfStudent();
    public function geOnGoingExam();
    public function saveAnswerPaper(Request $request);
    public function enrolledExam($id);
    public function enrolledSubject($id);
}