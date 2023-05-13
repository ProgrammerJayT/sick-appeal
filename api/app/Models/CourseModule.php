<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseModule extends Model
{
    protected $primaryKey = 'course_module_id';
    protected $guarded = [];
    use HasFactory;
}