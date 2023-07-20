<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;

class Exam extends Model
{
    use HasFactory;

    protected $table="exams";
    protected $primaryKey="id";

    protected $fillable = [
        'exam_name',
        'subject_id',
        'start_time',
        'end_time'
    ];

    function subject() {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    function user() {
        return $this->belongsToMany(User::class,'exam_student','exam_id','student_id');
    }

    function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    
}
