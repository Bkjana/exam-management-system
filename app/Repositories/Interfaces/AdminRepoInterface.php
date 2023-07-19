<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface AdminRepoInterface{

    public function index();



    public function getAllStudentWithNumberOfSubjectAndExam();
    public function getAllStudentFromTrashed();
    public function studentDelete($id);
    public function studentRestore($id);
    public function studentPermanentDelete($id);



    public function getAllSubjectWithNumberOfStudent();
    public function saveSubject(Request $request);
    public function deleteSubject($id);
    public function getSubject($id);
    public function editSubject(Request $request);



    public function getAllExamWithNumberOfStudent();
    public function saveExam(Request $request);
    public function getExam($id);
    public function editExam(Request $request);
    public function deleteExam($id);




    public function getAllTeacherWithNumberOfSubjectAssign();
    public function getAllTeacher();
    public function getAllTeacherFromTrashed();
    public function teacherDelete($id);
    public function teacherRestore($id);
    public function teacherPermanentDelete($id);
    public function getTeacherWhoAreUnverified();
    public function acceptTeacher($id);


}