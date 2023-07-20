<?php
namespace App\Repositories;
use App\Models\Exam;
use App\Models\User;
use App\Repositories\Interfaces\StudentRepoInterface;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentRepository implements StudentRepoInterface
{
    public function subjectsThatAreStudentEnrolled(){
        $stu_id=session()->get('student')->id;
        $user = User::find($stu_id);
        return $user->subject;
    }
    public function subjectsThatAreStudentNotEnrolled(){
        $enrolledSubjectId = $this->subjectsThatAreStudentEnrolled()->pluck('id')->toArray();
        $notEnrolledsubject = Subject::whereNotIn('id',$enrolledSubjectId)->get();
        return $notEnrolledsubject;
    }
    public function upcomingExamOfStudent(){
        $studentId = session()->get('student')->id;
        $enrolledSubjectId = $this->subjectsThatAreStudentEnrolled()->pluck('id')->toArray();
        $upcomingExam = Exam::whereIn('subject_id',$enrolledSubjectId)
                            ->where('end_time','>',Carbon::now())
                            ->whereDoesntHave('user', function ($query) use ($studentId) {
                                $query->where('users.id', $studentId);
                            })
                            ->get();
        return $upcomingExam;
    }
    public function geOnGoingExam(){
        $studentId = session()->get('student')->id;
        $enrolledSubjectId = $this->subjectsThatAreStudentEnrolled()->pluck('id')->toArray();
        $onGoingingExam = Exam::whereIn('subject_id',$enrolledSubjectId)
                            ->whereHas('user', function ($query) use ($studentId) {
                                $query->where('users.id', $studentId);
                            })
                            ->where('start_time','<=',Carbon::now())
                            ->where('end_time','>',Carbon::now())
                            ->get();
        return $onGoingingExam;
    }
    public function saveAnswerPaper(Request $request){
        $file_name="exam-".$_POST['exam_id']."student-".session()->get('student')->id.".pdf";
        $file = $request->file('answerpaper');
        $file->storeAs('answer', $file_name,'public');
    }
    public function enrolledExam($id){
        $stu_id = session()->get('student')->id;
        $user = User::find($stu_id);
        $user->exam()->attach($id);
    }
    public function enrolledSubject($id){
        $stu_id = session()->get('student')->id;
        $user = User::find($stu_id);
        $user->subject()->attach($id);
    }
}
