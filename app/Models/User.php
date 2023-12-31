<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $table="users";
     protected $primaryKey="id"; 
     protected $fillable=[
        'name',
        'email',
        'address',
        'mobile',
        'role',
     ];

     function exam() {
        return $this->belongsToMany(Exam::class,'exam_student','student_id','exam_id');
     }
     function subject() {
        return $this->belongsToMany(Subject::class,'student_subject','student_id','subject_id');
     }

     function examCreatedBy(){
         return $this->hasMany(Exam::class,'created_by','id');
     }

     function teacher() {
         //get all subject of a perticular teacher, by mistake the name is different if i changed this it give me too many headche......
         //As i don't remember where i used this function
         return $this->hasMany(Subject::class,'assign_teacher','id');
     }
     
}
