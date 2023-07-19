<?php

namespace App\Repositories;
use App\Models\Exam;
use App\Models\Subject;
use App\Repositories\Interfaces\AdminRepoInterface;
use App\Models\User;

class AdminRepository implements AdminRepoInterface
{
    public function getAllStudentWithNumberOfSubjectAndExam() {
        return User::where('role','student')
        ->withCount(['exam','subject'],)->get();
    }

    public function getAllTeacherWithNumberOfSubjectAssign(){
        return User::where('role','teacher')
        ->withCount('teacher')->get();
    }

    public function getAllSubjectWithNumberOfStudent(){
        return Subject::withCount(['user as student_count' => function($q) {
            $q->where('role', 'student');
        },'exam'])->get();
    }

    public function getAllExamWithNumberOfStudent() {
        return Exam::withCount([
            'user as student_register'=>function($q){
                $q->where('role','student');
            }])->get();
    }
}
