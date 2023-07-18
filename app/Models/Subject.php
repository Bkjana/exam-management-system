<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne("user",'assign_teacher','id');
    }

    function user() {
        return $this->belongsToMany('user','student_subject','student_id','subject_id');
    }
}
