<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TeacherRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    private TeacherRepoInterface $teacherRepoInterface;
    public function __construct(TeacherRepoInterface $teacherRepoInterface)
    {
        $this->teacherRepoInterface = $teacherRepoInterface;
    }
    function index()
    {
        $subjects = $this->teacherRepoInterface->getSubjectOfTeacher();
        $exams = $this->teacherRepoInterface->getExamOfTeacher();
        return view("teacher.index", compact('subjects', 'exams'));
    }
    function register(){
        return view("teacher.register");
    }
    function logout()
    {
        session()->remove('teacher');
        return redirect("/");
    }
    function examView()
    {
        $subjects = $this->teacherRepoInterface->getSubjectOfTeacher();
        return view('teacher.examSave', compact('subjects'));
    }
    function examSave(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|unique:exams',
            'subject_id' => 'required|numeric|not_in:0',
            'start_time' => 'required|date_format:Y-m-d\TH:i|after:now',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'question_file' => 'required|mimes:pdf|max:2048',
        ]);
        $this->teacherRepoInterface->saveExam($request);
        return redirect("/teacher");
    }
    function subject()
    {
        $subjects = $this->teacherRepoInterface->getSubjectOfTeacher();
        return view("teacher.subject", compact('subjects'));
    }
    function viewAnswershet($exam_id)
    {
        $res=$this->teacherRepoInterface->checkExamIfTeachersCreatedOrNot($exam_id);
        $exam = $res[1];
        if($res[0]){
            $substring = 'exam-'.$exam_id.'student';
            $directory = 'public/answer/'; 
            $files = Storage::files($directory);
            $answerFiles = collect($files)->filter(function ($file) use ($substring) {
                return strpos($file, $substring) !== false;
            });
            for($i=1; $i<=count($answerFiles); $i++){
                $answerFiles[$i] = str_replace('public','storage',$answerFiles[$i]);
            }
            // dd($answerFiles);
        }
        else{
            $answerFiles=[];
        }
        return view('teacher.viewAnswershet',compact('answerFiles','exam'));
    }
}