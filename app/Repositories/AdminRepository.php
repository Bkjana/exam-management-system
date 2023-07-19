<?php

namespace App\Repositories;
use App\Models\Exam;
use App\Models\Subject;
use App\Repositories\Interfaces\AdminRepoInterface;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRepository implements AdminRepoInterface
{
    public function index(){
        $arr=[];
        $arr['total_student'] = User::where('role','student')
                                ->count();
        $arr['total_teacher'] = User::where('role','teacher')
                                ->count();
        $arr['total_subject'] = Subject::count();
        $arr['total_exam'] = Exam::count();
        return $arr;
    }




    public function getAllStudentWithNumberOfSubjectAndExam() {
        return User::where('role','student')
        ->withCount(['exam','subject'],)->get();
    }
    public function getAllStudentFromTrashed() {
        return User::onlyTrashed()
        ->where('role','student')
        ->withCount(['exam','subject'],)->get();
    }
    public function studentDelete($id){
        $student=User::find($id);
        if(!is_null($student) && $student->role=="student"){
            $student->delete();
        }
    }
    public function studentRestore($id){
        $student=User::withTrashed()->find($id);
        if($student->trashed()){
            $student->restore();
        }
    }

    public function studentPermanentDelete($id){
        $student=User::withTrashed()->find($id);
        if($student->trashed()){
            $student->forceDelete();
        }
    }




    public function getAllSubjectWithNumberOfStudent(){
        return Subject::withCount(['user as student_count' => function($q) {
            $q->where('role', 'student');
        },'exam'])->get();
    }
    public function saveSubject(Request $request){
        $subject = new Subject;
        $subject->subject = $_POST['subject'];
        $subject->assign_teacher = $_POST['assign_teacher'];
        $subject->save();
    }
    function deleteSubject($id) {
        $subject = Subject::find($id);
        if(!is_null($subject)){
            $subject->delete();
        }
    }
    public function getSubject($id){
        return Subject::find($id);
    }
    public function editSubject(Request $request){
        $subject = Subject::find($_POST['id']);
        $subject->subject = $_POST['subject'];
        $subject->assign_teacher = $_POST['assign_teacher'];
        $subject->save();
    }







    public function getAllTeacherWithNumberOfSubjectAssign(){
        return User::where('role','teacher')
        ->withCount('teacher')->get();
    }
    public function getAllTeacher(){
        return User::where('role','teacher')->get();
    }


    public function getAllExamWithNumberOfStudent() {
        return Exam::withCount([
            'user as student_register'=>function($q){
                $q->where('role','student');
            }])->get();
    }
}
