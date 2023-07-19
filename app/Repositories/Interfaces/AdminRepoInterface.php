<?php
namespace App\Repositories\Interfaces;

interface AdminRepoInterface{

    public function index();



    public function getAllStudentWithNumberOfSubjectAndExam();
    public function getAllStudentFromTrashed();
    public function studentDelete($id);
    public function studentRestore($id);
    public function studentPermanentDelete($id);


    

    public function getAllTeacherWithNumberOfSubjectAssign();

    public function getAllSubjectWithNumberOfStudent();

    public function getAllExamWithNumberOfStudent();
}