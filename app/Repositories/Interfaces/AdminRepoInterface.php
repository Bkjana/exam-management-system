<?php
namespace App\Repositories\Interfaces;

interface AdminRepoInterface{

    public function getAllStudentWithNumberOfSubjectAndExam();

    public function getAllTeacherWithNumberOfSubjectAssign();

    public function getAllSubjectWithNumberOfStudent();

    public function getAllExamWithNumberOfStudent();
}