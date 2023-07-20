<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface TeacherRepoInterface{
    public function getSubjectOfTeacher();
    public function getExamOfTeacher();
    public function saveExam(Request $request);
    public function checkExamIfTeachersCreatedOrNot($exam_id);
}