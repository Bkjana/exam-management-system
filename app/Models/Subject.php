<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subject extends Model
{
    use HasFactory;
    protected $table="subjects";
    protected $primaryKey="id";

    protected $fillable=[
        'subject',
        'assign_teacher'
    ];

    function teacher() {
        return $this->belongsTo(User::class,'assign_teacher','id');

    }

    function user() {
        return $this->belongsToMany(User::class,'student_subject','subject_id','student_id');
    }

    function exam() {
        return $this->hasMany(Exam::class,'subject_id','id');
    }
}
