<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    protected $primaryKey = 'lecturer_course_id';
    protected $guarded = [];
    use HasFactory;
}
