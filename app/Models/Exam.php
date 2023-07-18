<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('subject','subject_id','id');
    }

    function user() {
        return $this->belongsToMany('user','exam_student','exam_id','student_id');
    }

    
}
