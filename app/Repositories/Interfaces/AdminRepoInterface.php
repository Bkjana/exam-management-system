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



    public function getAllTeacherWithNumberOfSubjectAssign();
    public function getAllTeacher();


    public function getAllExamWithNumberOfStudent();
}