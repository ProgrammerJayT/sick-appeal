<?php

namespace App\Models;

use App\Models\Module;
use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    protected $primaryKey = 'course_id';
    protected $guarded = [];
    use HasFactory;

    public function courseModules()
    {
        return $this->hasMany(CourseModule::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'course_modules');
    }
}