<?php

namespace App\Models;

use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    protected $primaryKey = 'module_id';
    protected $guarded = [];
    use HasFactory;
}