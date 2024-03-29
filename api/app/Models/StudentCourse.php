<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $primaryKey = 'student_course_id';
    protected $guarded = [];
    use HasFactory;
}
