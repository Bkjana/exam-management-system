<?php
namespace App\Repositories;
use App\Models\Exam;
use App\Repositories\Interfaces\TeacherRepoInterface;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherRepository implements TeacherRepoInterface
{
    public function getSubjectOfTeacher(){
        $teacher_id = session()->get('teacher')->id;
        $teacher = User::find($teacher_id);
        $subjects = $teacher->teacher;
        return $subjects;
    }
    public function getExamOfTeacher(){
        $teacher_id = session()->get('teacher')->id;
        $teacher = User::find($teacher_id);
        $exams = $teacher->examCreatedBy;
        // dd($exams);
        return $exams;
    }
    public function saveExam(Request $request){
        $exam = new Exam;
        $exam->exam_name = $_POST['exam_name'];
        $exam->subject_id = $_POST['subject_id'];
        $exam->start_time = $_POST['start_time'];
        $exam->end_time = $_POST['end_time'];
        $exam->created_by = session()->get('teacher')->id;
        $exam->save();
        $file_name="exam".$exam->id.".pdf";
        $file = $request->file('question_file');
        $file->storeAs('exam', $file_name,'public');
    }
    public function checkExamIfTeachersCreatedOrNot($exam_id){
        $exam = Exam::find($exam_id);
        $teacher_id = session()->get('teacher')->id;
        if($exam->created_by == $teacher_id){
            return array(true,$exam);
        }
        else{
            return array(false, $exam);
        }
    }
    
}
